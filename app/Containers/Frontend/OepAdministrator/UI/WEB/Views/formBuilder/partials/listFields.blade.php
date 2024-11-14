
@foreach($fields as $field)
<div class="d-flex align-items-center bg-light rounded px-5 py-4 mb-6 shadow shadow-xs" data-item-id="{{ $field->id }}">
    <i class="fa {{ $field->fieldType->icon }} text-info dragula-handle fs-1 me-5" style="cursor: move;"></i>
    <div class="flex-grow-1 me-2">
        <a href="#" class="fw-bold text-gray-800 text-hover-primary fs-6">{{ $field->label }}</a>
        <span class="text-muted fw-semibold d-block">{{ $field->fieldType->name }}</span>
    </div>
    <div>
        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-secondary kt_edit_form_field"
                data-url="{{ route('oep_admin_form_builder_edit_form_field', ['id' => $field->fid_form, 'field_id' => $field->id]) }}">
            <i class="ki-outline ki-pencil fs-4"></i>
        </button>
        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-secondary kt_delete_form_field"
                data-url="{{ route('oep_admin_form_builder_delete_form_field', ['id' => $field->fid_form, 'field_id' => $field->id]) }}">
            <i class="ki-outline ki-trash fs-4"></i>
        </button>
    </div>
</div>
@endforeach