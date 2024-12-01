<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Tasks;

use App\Containers\CoreMonitoring\FormBuilder\Data\Repositories\FieldRepository;
use App\Containers\CoreMonitoring\FormBuilder\Models\FieldType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CreateDefaultFieldTask extends ParentTask
{
    public function __construct(
        protected FieldRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(FieldType $type, $form_id): mixed
    {
        $options = json_decode($type->options);

        $data = [
            'fid_form' => $form_id,
            'fid_field_type' => $type->id,
            'field_type_name' => $type->type,
            'field_subtype' => $options->input->subtype[0],
            'unique_fieldname' => Str::random(24),
            'label' => $type->name . ' ' . rand(11111, 99999), //NOSONAR
            'order' => 0,
        ];

        $last_order_key = app(FindLastOrderKeyFormFieldsTask::class)->run($form_id);
        if ($last_order_key !== null) {
            $data['order'] = (int) $last_order_key + 1;
        }

        try {
            $field = $this->repository->create($data);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }

        $unique_code = hash(
            "sha512",
            $field->id . Carbon::now()->timestamp . $form_id .  $type->id . $type->type . Str::random(24)
        );

        $data = [
            'unique_fieldname' => $type->type . '-' . strtoupper(substr($unique_code, 0, 10)),
        ];

        switch ($type->type) {
            case 'textbox':

                break;
            case 'select':
            case 'checkbox':
                $data['options_type'] = 'custom';
                // $data['options'] = '[]';
                break;
        }

        try {
            return $this->repository->update($data, $field->id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }

    }
}
