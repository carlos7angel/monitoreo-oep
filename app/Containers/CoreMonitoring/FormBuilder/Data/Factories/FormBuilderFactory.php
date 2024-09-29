<?php

namespace App\Containers\CoreMonitoring\FormBuilder\Data\Factories;

use App\Containers\CoreMonitoring\FormBuilder\Models\FormBuilder;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of FormBuilderFactory
 *
 * @extends ParentFactory<TModel>
 */
class FormBuilderFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = FormBuilder::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
