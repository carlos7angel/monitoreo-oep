INSERT INTO field_types VALUES (1, 'Texto Corto', 'textbox', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"text\"],\"defaultvalue\":true,\"readonly\":true},\"validation\":{\"required\":true,\"minlength\":true,\"maxlength\":true,\"regex\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true,\"prepend\":true,\"append\":true},\"advanced\":{\"clogic\":true}}', 'fa-font', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (2, 'Campo Numérico', 'textbox', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"digits\",\"decimal\"],\"defaultvalue\":true,\"readonly\":true},\"validation\":{\"required\":true,\"minlength\":true,\"maxlength\":true,\"max\":true,\"min\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true,\"prepend\":true,\"append\":true},\"advanced\":{\"clogic\":true}}', 'fa-dollar', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (3, 'URL', 'textbox', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"url\"],\"defaultvalue\":true,\"readonly\":true},\"validation\":{\"required\":true,\"minlength\":true,\"maxlength\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true,\"prepend\":true,\"append\":true},\"advanced\":{\"clogic\":true}}', 'fa-link', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (4, 'Correo Electrónico', 'textbox', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"email\"],\"readonly\":true,\"defaultvalue\":true},\"validation\":{\"required\":true,\"minlength\":true,\"maxlength\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true,\"prepend\":true,\"append\":true},\"advanced\":{\"clogic\":true}}', 'fa-envelope', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (5, 'Campo Oculto', 'hidden', NULL, 'form_element', '{\"general\":{\"fieldname\":true},\"input\":{\"subtype\":[\"hidden\"],\"defaultvalue\":true},\"validation\":{\"required\":true},\"styles\":null,\"advanced\":null}', 'fa-i-cursor', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (6, 'Texto Largo', 'textarea', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"textarea\",\"tinymce\"],\"readonly\":true,\"rows\":true,\"defaultvalue\":true},\"validation\":{\"required\":true,\"minlength\":true,\"maxlength\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":{\"clogic\":true}}', 'fa-text-width', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (7, 'Lista Seleccionar', 'select', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":false,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"select\",\"multiselect\"],\"optionstype\":true,\"options\":true,\"search\":true},\"validation\":{\"required\":true,\"minselect\":true,\"maxselect\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":{\"clogic\":true}}', 'fa-list-alt', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (8, 'Grupo de Checkbox', 'checkbox', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"checkbox\"],\"optionstype\":true,\"options\":true,\"readonly\":true},\"validation\":{\"required\":true,\"minselect\":true,\"maxselect\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":{\"clogic\":true}}', 'fa-check-square', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (9, 'Fecha', 'datepicker', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"placeholder\":false,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"date\",\"time\"],\"readonly\":true,\"defaultvalue\":true},\"validation\":{\"required\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":{\"clogic\":true}}', 'fa-calendar-check', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (10, 'Archivo', 'fileupload', NULL, 'form_element', '{\"general\":{\"fieldname\":true,\"label\":true,\"tooltip\":true,\"alias\":true},\"input\":{\"subtype\":[\"fileupload\",\"filemanager\"],\"maxsize\":true,\"mimetypes\":true},\"validation\":{\"required\":true,\"maxfiles\":true},\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":{\"clogic\":true}}', 'fa-download', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (11, 'Título', 'html', NULL, 'html_element', '{\"general\":{\"fieldname\":true,\"text\":true,\"tooltip\":true},\"input\":{\"subtype\":[\"title\"],\"heading\":true},\"validation\":null,\"styles\":{\"gridcolumn\":true,\"classname\":true,\"color\":true},\"advanced\":null}', 'fa-header', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (12, 'Párrafo', 'html', NULL, 'html_element', '{\"general\":{\"fieldname\":true,\"text\":true},\"input\":{\"subtype\":[\"paragraph\"]},\"validation\":null,\"styles\":{\"gridcolumn\":true,\"classname\":true},\"advanced\":null}', 'fa-align-left', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');
INSERT INTO field_types VALUES (13, 'Linea Divisora', 'html', NULL, 'html_element', '{\"general\":{\"fieldname\":true},\"input\":{\"subtype\":[\"divider\"]},\"validation\":null,\"styles\":{\"classname\":true},\"advanced\":null}', 'fa-arrows-h', true, '2024-10-01 00:00:00', '2024-10-01 00:00:00');