<form id="kt_modal_update_password_form" class="form" action="#">
    <div class="fv-row mb-10">
        <label class="required form-label fs-6 mb-2">Informe</label>
        <input type="file" name="analysis_file_report" class="files kt_analysis_report_files"
               id="kt_analysis_file_report" data-maxsize="5" data-maxfiles="1" data-accept="pdf">
        <div class="text-muted fs-7">Máximo de tamaño permitido 5MB. Formatos aceptados: PDF</div>
    </div>

    <div class="fv-row mb-10">
        <label class="form-label fw-semibold fs-6 mb-2">Comentarios</label>
        <textarea class="form-control" rows="3" name="analysis_observations" placeholder=""></textarea>
    </div>
    <div class="text-center pt-15">
        <button type="button" class="btn btn-light me-3">Cancelar</button>
        <button type="button" class="btn btn-primary">
            <span class="indicator-label">Guardar</span>
            <span class="indicator-progress">Espere por favor...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</form>