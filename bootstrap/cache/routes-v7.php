<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => true,
    1 => 
    array (
      '/v1/password/forgot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mPq8T068lIR6vXsp',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/clients/web/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QxK2EsN3sxop7RZJ',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hg8N8BMPhT2YQEb0',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/clients/web/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6yVN8nsT8Fv4kyf6',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dJx82e0iqjoIobca',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AUeB0Jv4o1BafweY',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/email/verification-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XzARmdLplzquGAiQ',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r4LWY0IXt3qLFrqD',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web_index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ohKQoYQDv8npTwea',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home-page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/roles/assign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qixorFOWVZMnm5Gn',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ATgywlbGEZFJLaD7',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1ccJP0i9gIIViNBy',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZA7KdgRQPMF5OeSe',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/unauthorized' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'unauthorized-page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::41LFpnPSJc6wkyeh',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/v1/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PspcXo323xGh6N1L',
          ),
          1 => 'api.monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/accreditations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::a10eOitGIzp0CrS6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/accreditations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ywQs1phIW7Ajhkc8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/analyses/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pwRHTZVgmd2FioCT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/analyses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oL0dY6l8CAspOSWj',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::479TTxE7onHlfv0O',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/catalogs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7sOxOf5Y5zybZYFu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/file-managers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6qo2oRD1gPNyr7c8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/file-managers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lLNWCy5uxXZlD5v4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/registrations/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bXcDlu4ALNWy9Ffd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/registrations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y3ibu5caeJq1CGZx',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/acreditaciones/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_list_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/registros/elecciones/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_registration_elections_list_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/inicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_index',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7vnI1xBx9O4IQ0Ai',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/registros/elecciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_registration_elections_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/olvidaste-tu-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_post_forgot_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_forgot_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/ingreso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_post_login',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_login',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_post_logout',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/restablecer-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_post_reset_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_reset_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/acreditaciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/perfil' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_my_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/acreditaciones/nuevo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_new',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/medio-comunicacion/categoria' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_category_data_show',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_category_data_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/medio-comunicacion/contacto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_contact_data_show',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_contact_data_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/medio-comunicacion/archivos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_file_data_show',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_file_data_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/medio-comunicacion/general' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_general_data_show',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_profile_general_data_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/acreditaciones/elecciones/activos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_election_accreditations_active_elections_list_partial',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/actualizar-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_update_password_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/u/admin/actualizar-usuario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_media_update_username_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/elecciones/nuevo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_create',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/partidos-politicos/nuevo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_create',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logs/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_activity_logs_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/elecciones/dt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/formularios/dt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_forms_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/partidos-politicos/dt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_list_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios/dt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/analisis/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_list_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/reportes/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_list_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios/nuevos/dt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_json_dt_new',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/inicio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_index',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::t4v3bwHaAo2E9EgA',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_activity_logs',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/analisis' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/elecciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios/procesos-electorales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_elections_list_for_accreditation',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios/procesos-electorales/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_elections_list_for_accreditation_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/procesos-electorales' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_elections_list_for_monitoring',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/procesos-electorales/json' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_elections_list_for_monitoring_json_dt',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/reportes/eleccions-habilitadas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_monitoring_report_show_active_elections_partial',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/formularios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_forms',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_forms_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/monitoreo/reportes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/medios/nuevos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_list_new',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/partidos-politicos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/usuarios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_users_list',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_users_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/olvidaste-tu-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_login_forgot_password_post',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_login_forgot_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ingreso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_post_login',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_login',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_post_logout',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/restablecer-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_login_reset_password_post',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_login_reset_password',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/perfil' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_my_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/elecciones/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/partidos-politicos/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_store',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/actualizar-contrasena' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_update_password_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/actualizar-usuario' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_update_username_profile',
          ),
          1 => 'monitoreo-oep.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/registro-medios' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web_form_media',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web_form_media_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs/private' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'private_docs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'public_docs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/queries/explain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.queries.explain',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|(?i:api\\.monitoreo\\-oep\\.test)\\.(?|/v1/(?|oauth/(?|tokens/([^/]++)(*:73)|clients/([^/]++)(?|(*:99))|personal\\-access\\-tokens/([^/]++)(*:140))|email/verify/([^/]++)/([^/]++)(*:179)|roles/(?|([^/]++)(?|(*:207)|/permissions(*:227))|revoke(*:242)|sync(*:254))|permissions/(?|([^/]++)(*:286)|attach(*:300)|detach(*:314)|sync(*:326))|users/([^/]++)(?|/(?|p(?|ermissions(?|(*:373))|assword(*:389))|roles(*:403))|(*:412))))|(?:(?:[^./]*+\\.)++)(?|/a(?|ccreditations/(?|([^/]++)(?|(*:478)|/edit(*:491)|(*:499))|store(*:513)|([^/]++)(*:529))|nalyses/(?|([^/]++)(?|(*:560)|/edit(*:573)|(*:581))|store(*:595)|([^/]++)(*:611)))|/catalogs/(?|([^/]++)(?|(*:645)|/edit(*:658)|(*:666))|store(*:680)|([^/]++)(*:696))|/file\\-managers/(?|([^/]++)(?|(*:735)|/edit(*:748)|(*:756))|store(*:770)|([^/]++)(*:786))|/registrations/(?|([^/]++)(?|(*:824)|/edit(*:837)|(*:845))|store(*:859)|([^/]++)(*:875)))|(?i:monitoreo\\-oep\\.test)\\.(?|/u/admin/(?|registros/elecciones/([^/]++)/material\\-propaganda(?|/(?|nuevo(*:989)|([^/]++)/e(?|liminar(*:1017)|ditar(*:1031))|guardar(*:1048)|([^/]++)/actualizar(*:1076))|(*:1086))|acreditaciones/(?|detalle/([^/]++)(*:1130)|e(?|ditar/([^/]++)(?|(*:1160))|nviar/([^/]++)(*:1184))))|/admin/(?|m(?|onitoreo/(?|reporte(?|s/(?|([^/]++)/(?|items/actualizar(*:1265)|analisis/nuevo(*:1288))|nuevo/elecciones/([^/]++)(*:1323)|([^/]++)/(?|detalle(*:1351)|item/([^/]++)/(?|detalle(*:1384)|remover(*:1400))|elecciones/([^/]++)/available\\-items(*:1446)|cambiar\\-estado(*:1470)))|/([^/]++)/pdf(*:1494))|analisis/([^/]++)/(?|informe\\-complementario(*:1548)|detalle(*:1564)|formulario(*:1583)|re(?|solucion\\-(?|final(*:1615)|primera\\-instancia(*:1642))|chazar(*:1658))|en(?|\\-tratamiento(*:1686)|viar\\-secretaria(*:1711)))|procesos\\-electorales/([^/]++)/(?|medios/([^/]++)/(?|nuevo(*:1780)|guardar(*:1796))|registro(?|\\-monitoreo/([^/]++)/(?|detalle(*:1848)|e(?|ditar(?|(*:1869))|nviar(*:1884)))|s(?|(*:1899)|/json(*:1913)))))|edios/(?|habilitar/([^/]++)(*:1953)|procesos\\-electorales/([^/]++)/acreditaciones(?|(*:2010)|/json(*:2024))|nuevos/detalle/([^/]++)(*:2057)|acreditaciones/([^/]++)(*:2089)|([^/]++)/detalle(*:2114)|acreditaciones/([^/]++)/cambiar\\-estado(*:2162)))|formularios/([^/]++)/(?|field(?|(*:2205)|/([^/]++)/e(?|liminar(*:2235)|ditar(?|(*:2252))))|constructor(*:2275)|ordenar(*:2291))|elecciones/([^/]++)/(?|detalle(*:2331)|editar(*:2346)|update(*:2361)|cambiar\\-estado(*:2385))|partidos\\-politicos/([^/]++)/(?|detalle(*:2434)|e(?|ditar(*:2452)|lecciones/(?|json(*:2478)|([^/]++)/material(*:2504)))|cuenta/habilitar(*:2531)|registro/eleccion(*:2557)|actualizar(*:2576))|usuarios/(?|([^/]++)(*:2606)|dt(*:2617)|([^/]++)/password(*:2643))|logs/([^/]++)(*:2666)))|(?:(?:[^./]*+\\.)++)(?|/proceso(?|s\\-electorales/([^/]++)/([^/]++)(*:2742)|\\-electoral/([^/]++)/([^/]++)/m(?|aterial(*:2792)|edios(*:2806)))|/_debugbar/c(?|lockwork/([^/]++)(*:2849)|ache/([^/]++)(?:/([^/]++))?(*:2885))))/?$}sDu',
    ),
    3 => 
    array (
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      140 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      179 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eOzgaf6HPMFtRa6w',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Wg9WoHIBdIMOlwPw',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pv8O0TvP7lKSBsal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      242 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ycgg0nnCPeOQXYLw',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xRyVl42mc45wHMPR',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      286 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nT7yLY7uszNxOpav',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      300 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iC9ZqqCCoyqntm6e',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::94Uv6gQI0dIJPz96',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rdJCTCruGBkbjv4P',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mlmlwZPZjvcjBlGC',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9OgzUTqqn86CcQBc',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::204JZvpUsG0xtSgg',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jP2RwleSQHAAiXKA',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2wTEh224L5QslIYF',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      412 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hGjQ1DYWZppILPmS',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hSb2bG7FxKDkJJje',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'generated::95oGJLZLSR7NcqyP',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      478 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::043bFbLJHqffYDEQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VPtQ6ZZrjaNysQB3',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pca39fofEeh2Xcqe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      513 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::80qRD7B56SP9epRQ',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      529 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i7vRKjwOc1YMB91j',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      560 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PZ5JtGESAYS9CXJQ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Jw7PdVxfJxklMzh8',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NHAGaSRe70p6qRXY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      595 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vHemFSgfoyzwLKJq',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      611 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r7vZACNwQi3yJjNj',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F7kUlkbZcohelTnd',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      658 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ynjWMVGHDTc1J8x2',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZxXur64V9vFCvR49',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      680 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4tHuM7fXA2WPoi82',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0QcGe21G5MYmG8Ui',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      735 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VX9YkkLcaOANWdjs',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nvYbzPS9DdSeN2O1',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Joy2X1NhC4rCvweC',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xO8w0NI94Jot9jor',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      786 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::poyYhaCVKqUI54bf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      824 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jbl4KgcWXfow7PKu',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DafzvYp1yVUVuLzW',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G95kVzHj00i2dPaT',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TBggoJLtkgigDCh5',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      875 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RnSPjNo44S4K8Y2P',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      989 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1017 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_delete',
          ),
          1 => 
          array (
            0 => 'registration_id',
            1 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1031 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_edit',
          ),
          1 => 
          array (
            0 => 'registration_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1048 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_update',
          ),
          1 => 
          array (
            0 => 'registration_id',
            1 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1086 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_propaganda_material_by_election_list',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1130 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1160 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ext_admin_accreditations_submit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_add_items',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_create',
          ),
          1 => 
          array (
            0 => 'election_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1384 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_details_item',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'monitoring_item_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1400 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_remove_item',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'monitoring_item_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1446 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_list_available_items',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'election_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_monitoring_report_change_status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1494 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_generate_pdf',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_complementary',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1583 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_form_edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_final_resolution',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_first_resolution',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1658 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_reject',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1686 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_in_treatment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1711 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_analysis_report_to_secretariat',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1780 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_create',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'media',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1796 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_store',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'media',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1848 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_detail',
          ),
          1 => 
          array (
            0 => 'election_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1869 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_edit',
          ),
          1 => 
          array (
            0 => 'election_id',
            1 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_update',
          ),
          1 => 
          array (
            0 => 'election_id',
            1 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1884 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_submit',
          ),
          1 => 
          array (
            0 => 'election_id',
            1 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1899 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_by_election',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_monitoring_by_election_json_dt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1953 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_enable_account',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2010 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_accreditations_by_election',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2024 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_accreditations_by_election_json_dt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2057 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_list_detail_partial',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2089 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_accreditation_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2114 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_profiles_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_media_accreditation_update_status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2205 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_builder_create_field_type',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_builder_delete_form_field',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'field_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_builder_edit_form_field',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'field_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_builder_update_form_field',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'field_id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2275 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_builder',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_form_sort',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2331 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2346 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2361 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2385 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_elections_update_status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2452 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2478 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_elections_json_dt',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2504 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_material',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'election_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_profile_enable_account',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_register_election',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_political_group_update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2606 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_users_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2617 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_users_json_dt',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2643 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_users_update_password',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2666 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'oep_admin_activity_log_show_detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web_show_election',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web_show_list_material',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2806 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web_show_list_accreditation_rates',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2849 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2885 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::mPq8T068lIR6vXsp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/password/forgot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\ForgotPasswordController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\ForgotPasswordController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::mPq8T068lIR6vXsp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QxK2EsN3sxop7RZJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/clients/web/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\LoginProxyForWebClientController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\LoginProxyForWebClientController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::QxK2EsN3sxop7RZJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hg8N8BMPhT2YQEb0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\LogoutController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\LogoutController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::hg8N8BMPhT2YQEb0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/oauth/token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'throttle',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'v1/oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'web',
          3 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'namespace' => NULL,
        'prefix' => 'v1/oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6yVN8nsT8Fv4kyf6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/clients/web/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\RefreshProxyForWebClientController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\RefreshProxyForWebClientController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::6yVN8nsT8Fv4kyf6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dJx82e0iqjoIobca' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\RegisterUserController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\RegisterUserController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::dJx82e0iqjoIobca',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AUeB0Jv4o1BafweY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\ResetPasswordController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\ResetPasswordController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::AUeB0Jv4o1BafweY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XzARmdLplzquGAiQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/email/verification-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\SendVerificationEmailController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\SendVerificationEmailController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::XzARmdLplzquGAiQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/email/verify/{id}/{hash}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'signed',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\VerifyEmailController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\VerifyEmailController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r4LWY0IXt3qLFrqD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\WelcomeController@unversioned',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\WelcomeController@unversioned',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
        'as' => 'generated::r4LWY0IXt3qLFrqD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ohKQoYQDv8npTwea' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\WelcomeController@versioned',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\API\\Controllers\\WelcomeController@versioned',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ohKQoYQDv8npTwea',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\AppSection\\Authentication\\UI\\WEB\\Controllers\\HomePageController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authentication\\UI\\WEB\\Controllers\\HomePageController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::qixorFOWVZMnm5Gn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/roles/assign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\AssignRolesToUserController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\AssignRolesToUserController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::qixorFOWVZMnm5Gn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ATgywlbGEZFJLaD7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\CreateRoleController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\CreateRoleController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ATgywlbGEZFJLaD7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::eOzgaf6HPMFtRa6w' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/roles/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\DeleteRoleController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\DeleteRoleController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::eOzgaf6HPMFtRa6w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nT7yLY7uszNxOpav' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/permissions/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\FindPermissionByIdController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\FindPermissionByIdController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::nT7yLY7uszNxOpav',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Wg9WoHIBdIMOlwPw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/roles/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\FindRoleByIdController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\FindRoleByIdController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Wg9WoHIBdIMOlwPw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::iC9ZqqCCoyqntm6e' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/permissions/attach',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\GivePermissionsToRoleController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\GivePermissionsToRoleController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::iC9ZqqCCoyqntm6e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mlmlwZPZjvcjBlGC' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'v1/users/{id}/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\GivePermissionsToUserController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\GivePermissionsToUserController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::mlmlwZPZjvcjBlGC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZA7KdgRQPMF5OeSe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListPermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListPermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ZA7KdgRQPMF5OeSe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pv8O0TvP7lKSBsal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/roles/{id}/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListRolePermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListRolePermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::pv8O0TvP7lKSBsal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1ccJP0i9gIIViNBy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListRolesController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListRolesController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::1ccJP0i9gIIViNBy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9OgzUTqqn86CcQBc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/users/{id}/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListUserPermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListUserPermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::9OgzUTqqn86CcQBc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2wTEh224L5QslIYF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/users/{id}/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListUserRolesController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\ListUserRolesController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::2wTEh224L5QslIYF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ycgg0nnCPeOQXYLw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/roles/revoke',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RemoveUserRolesController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RemoveUserRolesController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::Ycgg0nnCPeOQXYLw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::94Uv6gQI0dIJPz96' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/permissions/detach',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RevokeRolePermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RevokeRolePermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::94Uv6gQI0dIJPz96',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::204JZvpUsG0xtSgg' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/users/{id}/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RevokeUserPermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\RevokeUserPermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::204JZvpUsG0xtSgg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rdJCTCruGBkbjv4P' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/permissions/sync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\SyncRolePermissionsController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\SyncRolePermissionsController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::rdJCTCruGBkbjv4P',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xRyVl42mc45wHMPR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'v1/roles/sync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\SyncUserRolesController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\API\\Controllers\\SyncUserRolesController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::xRyVl42mc45wHMPR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'unauthorized-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'unauthorized',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\AppSection\\Authorization\\UI\\WEB\\Controllers\\UnauthorizedPageController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\Authorization\\UI\\WEB\\Controllers\\UnauthorizedPageController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'unauthorized-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hGjQ1DYWZppILPmS' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'v1/users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\DeleteUserController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\DeleteUserController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::hGjQ1DYWZppILPmS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hSb2bG7FxKDkJJje' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\FindUserByIdController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\FindUserByIdController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::hSb2bG7FxKDkJJje',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::41LFpnPSJc6wkyeh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\GetUserProfileController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\GetUserProfileController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::41LFpnPSJc6wkyeh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PspcXo323xGh6N1L' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'v1/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\ListUsersController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\ListUsersController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::PspcXo323xGh6N1L',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jP2RwleSQHAAiXKA' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'v1/users/{id}/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\UpdatePasswordController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\UpdatePasswordController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::jP2RwleSQHAAiXKA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::95oGJLZLSR7NcqyP' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'v1/users/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'throttle:api',
          2 => 'auth:api',
        ),
        'domain' => 'http://api.monitoreo-oep.test',
        'uses' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\UpdateUserController@__invoke',
        'controller' => 'App\\Containers\\AppSection\\User\\UI\\API\\Controllers\\UpdateUserController',
        'namespace' => NULL,
        'prefix' => '/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::95oGJLZLSR7NcqyP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::a10eOitGIzp0CrS6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accreditations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\CreateAccreditationController@create',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\CreateAccreditationController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::a10eOitGIzp0CrS6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::043bFbLJHqffYDEQ' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'accreditations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\DeleteAccreditationController@destroy',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\DeleteAccreditationController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::043bFbLJHqffYDEQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VPtQ6ZZrjaNysQB3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accreditations/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\UpdateAccreditationController@edit',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\UpdateAccreditationController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VPtQ6ZZrjaNysQB3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pca39fofEeh2Xcqe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accreditations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\FindAccreditationByIdController@show',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\FindAccreditationByIdController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pca39fofEeh2Xcqe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ywQs1phIW7Ajhkc8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accreditations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\ListAccreditationsController@index',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\ListAccreditationsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ywQs1phIW7Ajhkc8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::80qRD7B56SP9epRQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'accreditations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\CreateAccreditationController@store',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\CreateAccreditationController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::80qRD7B56SP9epRQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i7vRKjwOc1YMB91j' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'accreditations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\UpdateAccreditationController@update',
        'controller' => 'App\\Containers\\CoreMonitoring\\Accreditation\\UI\\WEB\\Controllers\\UpdateAccreditationController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::i7vRKjwOc1YMB91j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pwRHTZVgmd2FioCT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'analyses/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\CreateAnalysisController@create',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\CreateAnalysisController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::pwRHTZVgmd2FioCT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PZ5JtGESAYS9CXJQ' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'analyses/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\DeleteAnalysisController@destroy',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\DeleteAnalysisController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::PZ5JtGESAYS9CXJQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Jw7PdVxfJxklMzh8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'analyses/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\UpdateAnalysisController@edit',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\UpdateAnalysisController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Jw7PdVxfJxklMzh8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NHAGaSRe70p6qRXY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'analyses/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\FindAnalysisByIdController@show',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\FindAnalysisByIdController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::NHAGaSRe70p6qRXY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oL0dY6l8CAspOSWj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'analyses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\ListAnalysesController@index',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\ListAnalysesController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::oL0dY6l8CAspOSWj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vHemFSgfoyzwLKJq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'analyses/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\CreateAnalysisController@store',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\CreateAnalysisController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::vHemFSgfoyzwLKJq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r7vZACNwQi3yJjNj' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'analyses/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\UpdateAnalysisController@update',
        'controller' => 'App\\Containers\\CoreMonitoring\\Analysis\\UI\\WEB\\Controllers\\UpdateAnalysisController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::r7vZACNwQi3yJjNj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::479TTxE7onHlfv0O' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\CreateCatalogController@create',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\CreateCatalogController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::479TTxE7onHlfv0O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F7kUlkbZcohelTnd' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'catalogs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\DeleteCatalogController@destroy',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\DeleteCatalogController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::F7kUlkbZcohelTnd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ynjWMVGHDTc1J8x2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogs/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\UpdateCatalogController@edit',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\UpdateCatalogController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ynjWMVGHDTc1J8x2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZxXur64V9vFCvR49' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\FindCatalogByIdController@show',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\FindCatalogByIdController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZxXur64V9vFCvR49',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7sOxOf5Y5zybZYFu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'catalogs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\ListCatalogsController@index',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\ListCatalogsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7sOxOf5Y5zybZYFu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4tHuM7fXA2WPoi82' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'catalogs/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\CreateCatalogController@store',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\CreateCatalogController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::4tHuM7fXA2WPoi82',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::0QcGe21G5MYmG8Ui' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'catalogs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\UpdateCatalogController@update',
        'controller' => 'App\\Containers\\CoreMonitoring\\Catalog\\UI\\WEB\\Controllers\\UpdateCatalogController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::0QcGe21G5MYmG8Ui',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6qo2oRD1gPNyr7c8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-managers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@create',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::6qo2oRD1gPNyr7c8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VX9YkkLcaOANWdjs' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'file-managers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@destroy',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VX9YkkLcaOANWdjs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nvYbzPS9DdSeN2O1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-managers/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@edit',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::nvYbzPS9DdSeN2O1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Joy2X1NhC4rCvweC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-managers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@show',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Joy2X1NhC4rCvweC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lLNWCy5uxXZlD5v4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'file-managers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@index',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::lLNWCy5uxXZlD5v4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xO8w0NI94Jot9jor' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'file-managers/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@store',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::xO8w0NI94Jot9jor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::poyYhaCVKqUI54bf' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'file-managers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@update',
        'controller' => 'App\\Containers\\CoreMonitoring\\FileManager\\UI\\WEB\\Controllers\\Controller@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::poyYhaCVKqUI54bf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bXcDlu4ALNWy9Ffd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registrations/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\CreateRegistrationController@create',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\CreateRegistrationController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::bXcDlu4ALNWy9Ffd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jbl4KgcWXfow7PKu' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'registrations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\DeleteRegistrationController@destroy',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\DeleteRegistrationController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::jbl4KgcWXfow7PKu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DafzvYp1yVUVuLzW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registrations/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\UpdateRegistrationController@edit',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\UpdateRegistrationController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::DafzvYp1yVUVuLzW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G95kVzHj00i2dPaT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registrations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\FindRegistrationByIdController@show',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\FindRegistrationByIdController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::G95kVzHj00i2dPaT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Y3ibu5caeJq1CGZx' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registrations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\ListRegistrationsController@index',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\ListRegistrationsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Y3ibu5caeJq1CGZx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TBggoJLtkgigDCh5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'registrations/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\CreateRegistrationController@store',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\CreateRegistrationController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::TBggoJLtkgigDCh5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RnSPjNo44S4K8Y2P' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'registrations/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\UpdateRegistrationController@update',
        'controller' => 'App\\Containers\\CoreMonitoring\\Registration\\UI\\WEB\\Controllers\\UpdateRegistrationController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::RnSPjNo44S4K8Y2P',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/registros/elecciones/{id}/material-propaganda/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@createMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@createMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/registros/elecciones/{registration_id}/material-propaganda/{id}/eliminar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@deleteMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@deleteMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_delete',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/registros/elecciones/{registration_id}/material-propaganda/{id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@editMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@editMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_list_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/acreditaciones/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsJsonDt',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsJsonDt',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_list_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_registration_elections_list_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/registros/elecciones/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\RegistrationController@listRegistrationsJsonDt',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\RegistrationController@listRegistrationsJsonDt',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_registration_elections_list_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/inicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\IndexController@index',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\IndexController@index',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_index',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7vnI1xBx9O4IQ0Ai' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:60:"function() { return \\redirect()->route(\'ext_admin_index\'); }";s:5:"scope";s:52:"Apiato\\Core\\Abstracts\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000008650000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'domain' => 'monitoreo-oep.test',
        'as' => 'generated::7vnI1xBx9O4IQ0Ai',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_by_election_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/registros/elecciones/{id}/material-propaganda',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@listMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@listMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_by_election_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_registration_elections_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/registros/elecciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\RegistrationController@listRegistrations',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\RegistrationController@listRegistrations',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_registration_elections_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_post_forgot_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/olvidaste-tu-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postForgotPassword',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postForgotPassword',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_post_forgot_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_post_login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/ingreso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogin',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogin',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_post_login',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_post_logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogout',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogout',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_post_logout',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_post_reset_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/restablecer-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postResetPassword',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@postResetPassword',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_post_reset_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/acreditaciones/detalle/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@detailAccreditation',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@detailAccreditation',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/acreditaciones/editar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@editAccreditation',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@editAccreditation',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_forgot_password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/olvidaste-tu-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showForgotPasswordPage',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showForgotPasswordPage',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_forgot_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/acreditaciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditations',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditations',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/ingreso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showLoginPage',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showLoginPage',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_login',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_my_profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/perfil',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showMyProfile',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showMyProfile',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_my_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/acreditaciones/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
          2 => 'checkProfile',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@newAccreditation',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@newAccreditation',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_new',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_category_data_show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/medio-comunicacion/categoria',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showCategoryData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showCategoryData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_category_data_show',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_contact_data_show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/medio-comunicacion/contacto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showContactData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showContactData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_contact_data_show',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_file_data_show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/medio-comunicacion/archivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showFileData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showFileData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_file_data_show',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_general_data_show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/medio-comunicacion/general',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showGeneralData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showGeneralData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_general_data_show',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_election_accreditations_active_elections_list_partial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/acreditaciones/elecciones/activos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\ElectionController@listActiveElections',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\ElectionController@listActiveElections',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_election_accreditations_active_elections_list_partial',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_reset_password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'u/admin/restablecer-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showResetPasswordPage',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@showResetPasswordPage',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_reset_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/acreditaciones/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@store',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@store',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_category_data_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/medio-comunicacion/categoria',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeCategoryData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeCategoryData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_category_data_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_contact_data_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/medio-comunicacion/contacto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeContactData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeContactData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_contact_data_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_file_data_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/medio-comunicacion/archivos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeFileData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeFileData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_file_data_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_profile_general_data_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/medio-comunicacion/general',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeGeneralData',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@storeGeneralData',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_profile_general_data_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/registros/elecciones/{id}/material-propaganda/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@storeMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@storeMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/acreditaciones/enviar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@submit',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@submit',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_submit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_accreditations_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/acreditaciones/editar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@update',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AccreditationController@update',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_accreditations_update',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_update_password_profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/actualizar-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@updatePasswordProfile',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@updatePasswordProfile',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_update_password_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_propaganda_material_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/registros/elecciones/{registration_id}/material-propaganda/{id}/actualizar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@updateMaterial',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\PropagandaMaterialController@updateMaterial',
        'namespace' => NULL,
        'prefix' => 'u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_propaganda_material_update',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_media_update_username_profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'u/admin/actualizar-usuario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@updateUsernameProfile',
        'controller' => 'App\\Containers\\Frontend\\ExtAdministrator\\UI\\WEB\\Controllers\\AuthController@updateUsernameProfile',
        'namespace' => NULL,
        'prefix' => '/u/admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_media_update_username_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_add_items' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/items/actualizar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@addItems',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@addItems',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_add_items',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_complementary' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/informe-complementario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@complementaryAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@complementaryAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_complementary',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/analisis/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@createAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@createAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/elecciones/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@create',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@create',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_builder_create_field_type' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios/{id}/field',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@createFieldType',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@createFieldType',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_builder_create_field_type',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{id}/medios/{media}/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@createMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@createMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/nuevo/elecciones/{election_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@create',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@create',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/partidos-politicos/nuevo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@create',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@create',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_create',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_builder_delete_form_field' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios/{id}/field/{field_id}/eliminar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@deleteFormField',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@deleteFormField',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_builder_delete_form_field',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@detailAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@detailAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/elecciones/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@detail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@detail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{election_id}/registro-monitoreo/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@detailMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@detailMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@detail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@detail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/partidos-politicos/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@detail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@detail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_users_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/usuarios/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@detail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@detail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_users_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_details_item' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/item/{monitoring_item_id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@detailItem',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@detailItem',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_details_item',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/elecciones/{id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@edit',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@edit',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_form_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/formulario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@editFormAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@editFormAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_form_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_builder_edit_form_field' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/formularios/{id}/field/{field_id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@editFormField',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@editFormField',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_builder_edit_form_field',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{election_id}/registro-monitoreo/{id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@editMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@editMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/partidos-politicos/{id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@edit',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@edit',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_edit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_profile_enable_account' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/{id}/cuenta/habilitar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@enableAccount',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@enableAccount',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_profile_enable_account',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_enable_account' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/habilitar/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@enableAccount',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@enableAccount',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_enable_account',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_final_resolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/resolucion-final',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@finalResolutionAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@finalResolutionAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_final_resolution',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_first_resolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/resolucion-primera-instancia',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@firstResolutionAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@firstResolutionAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_first_resolution',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_generate_pdf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reporte/{id}/pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@pdfMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@pdfMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_generate_pdf',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_activity_logs_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logs/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@listJsonDT',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@listJsonDT',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_activity_logs_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/elecciones/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_forms_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_forms_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_list_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_list_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_list_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_list_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_elections_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/{id}/elecciones/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listElectionsJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listElectionsJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_elections_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_list_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_list_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_json_dt_new' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/nuevos/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listNewJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listNewJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_json_dt_new',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_users_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/usuarios/dt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@listJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@listJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_users_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_in_treatment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/en-tratamiento',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@inTreatmentAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@inTreatmentAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_in_treatment',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/inicio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\IndexController@index',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\IndexController@index',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_index',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::t4v3bwHaAo2E9EgA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:external',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:60:"function() { return \\redirect()->route(\'oep_admin_index\'); }";s:5:"scope";s:52:"Apiato\\Core\\Abstracts\\Providers\\RouteServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000009130000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'domain' => 'monitoreo-oep.test',
        'as' => 'generated::t4v3bwHaAo2E9EgA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_accreditations_by_election' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/procesos-electorales/{id}/acreditaciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsByElection',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsByElection',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_accreditations_by_election',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_accreditations_by_election_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/procesos-electorales/{id}/acreditaciones/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsByElectionJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listAccreditationsByElectionJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_accreditations_by_election_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_activity_logs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_activity_logs',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/analisis',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@listAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@listAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/elecciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_elections_list_for_accreditation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/procesos-electorales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listElectionsForAccreditation',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listElectionsForAccreditation',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_elections_list_for_accreditation',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_elections_list_for_accreditation_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/procesos-electorales/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listElectionsForAccreditationJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@listElectionsForAccreditationJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_elections_list_for_accreditation_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_elections_list_for_monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listElectionsForMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listElectionsForMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_elections_list_for_monitoring',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_elections_list_for_monitoring_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listElectionsForMonitoringJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listElectionsForMonitoringJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_elections_list_for_monitoring_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ext_admin_monitoring_report_show_active_elections_partial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reportes/eleccions-habilitadas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@showElections',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@showElections',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'ext_admin_monitoring_report_show_active_elections_partial',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_forms' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/formularios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_forms',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_material' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/partidos-politicos/{id}/elecciones/{election_id}/material',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listMaterial',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@listMaterial',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_material',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_by_election' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{id}/registros',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listMonitoringByElection',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listMonitoringByElection',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_by_election',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_by_election_json_dt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{id}/registros/json',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listMonitoringByElectionJsonDt',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@listMonitoringByElectionJsonDt',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_by_election_json_dt',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_list_available_items' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/elecciones/{election_id}/available-items',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@listAvailableMonitoringItems',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@listAvailableMonitoringItems',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_list_available_items',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/monitoreo/reportes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_list_new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/nuevos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listNew',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@listNew',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_list_new',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/partidos-politicos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_users_list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/usuarios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@list',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@list',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_users_list',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_builder' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/formularios/{id}/constructor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@showBuilderPage',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@showBuilderPage',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_builder',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_list_detail_partial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/nuevos/detalle/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showDetailNew',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showDetailNew',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_list_detail_partial',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_login_forgot_password_post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/olvidaste-tu-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postForgotPassword',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postForgotPassword',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_login_forgot_password_post',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_post_login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/ingreso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogin',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogin',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_post_login',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_post_logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogout',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postLogout',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_post_logout',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_login_reset_password_post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/restablecer-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postResetPassword',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@postResetPassword',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_login_reset_password_post',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_register_election' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/{id}/registro/eleccion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@registerElection',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@registerElection',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_register_election',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/rechazar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@rejectAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@rejectAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_reject',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_remove_item' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/item/{monitoring_item_id}/remover',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@removeItem',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@removeItem',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_remove_item',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_activity_log_show_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logs/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@showDetail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ActivityLogController@showDetail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_activity_log_show_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_accreditation_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/acreditaciones/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@detailAccreditation',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@detailAccreditation',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_accreditation_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_profiles_detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/medios/{id}/detalle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showDetail',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MediaProfileController@showDetail',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_profiles_detail',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_login_forgot_password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/olvidaste-tu-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showForgotPasswordPage',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showForgotPasswordPage',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_login_forgot_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ingreso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showLoginPage',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showLoginPage',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_login',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_my_profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/perfil',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showMyProfile',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showMyProfile',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_my_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_login_reset_password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/restablecer-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showResetPasswordPage',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@showResetPasswordPage',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_login_reset_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_sort' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios/{id}/ordenar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@sortFormFields',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@sortFormFields',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_sort',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/elecciones/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@store',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@store',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_forms_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@store',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@store',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_forms_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{id}/medios/{media}/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@storeMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@storeMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@store',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@store',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_users_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/usuarios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@store',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@store',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_users_store',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{election_id}/registro-monitoreo/{id}/enviar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@submitMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@submitMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_submit',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_analysis_report_to_secretariat' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/analisis/{id}/enviar-secretaria',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@toSecretariatAnalysis',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AnalysisReportController@toSecretariatAnalysis',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_analysis_report_to_secretariat',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/elecciones/{id}/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@update',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@update',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_update',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_form_builder_update_form_field' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/formularios/{id}/field/{field_id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@updateFormField',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\FormBuilderController@updateFormField',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_form_builder_update_form_field',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_monitoring_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/procesos-electorales/{election_id}/registro-monitoreo/{id}/editar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@updateMonitoring',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringController@updateMonitoring',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_monitoring_update',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_update_password_profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/actualizar-contrasena',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@updatePasswordProfile',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@updatePasswordProfile',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_update_password_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_users_update_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/usuarios/{id}/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@updatePassword',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\UserManagementController@updatePassword',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_users_update_password',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_political_group_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/partidos-politicos/{id}/actualizar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@update',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\PoliticalGroupProfileController@update',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_political_group_update',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_media_accreditation_update_status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/medios/acreditaciones/{id}/cambiar-estado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@updateStatusAccreditation',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AccreditationController@updateStatusAccreditation',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_media_accreditation_update_status',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_elections_update_status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/elecciones/{id}/cambiar-estado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@updateStatus',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\ElectionController@updateStatus',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_elections_update_status',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_monitoring_report_change_status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/monitoreo/reportes/{id}/cambiar-estado',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@changeStatus',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\MonitoringReportController@changeStatus',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_monitoring_report_change_status',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'oep_admin_update_username_profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/actualizar-usuario',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@updateUsernameProfile',
        'controller' => 'App\\Containers\\Frontend\\OepAdministrator\\UI\\WEB\\Controllers\\AuthController@updateUsernameProfile',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
        'as' => 'oep_admin_update_username_profile',
        'domain' => 'monitoreo-oep.test',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_show_election' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'procesos-electorales/{id}/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@showElectionPage',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@showElectionPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_show_election',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@index',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_show_list_material' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proceso-electoral/{id}/{slug}/material',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@listMaterialPage',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@listMaterialPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_show_list_material',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_show_list_accreditation_rates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'proceso-electoral/{id}/{slug}/medios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@listAccreditationRatesPage',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@listAccreditationRatesPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_show_list_accreditation_rates',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_form_media' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registro-medios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@showFormMedia',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@showFormMedia',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_form_media',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web_form_media_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'registro-medios',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@storeFormMedia',
        'controller' => 'App\\Containers\\Frontend\\Website\\UI\\WEB\\Controllers\\Controller@storeFormMedia',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web_form_media_store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'private_docs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs/private',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Vendor\\Documentation\\UI\\WEB\\Controllers\\Controller@showPrivateDocs',
        'controller' => 'App\\Containers\\Vendor\\Documentation\\UI\\WEB\\Controllers\\Controller@showPrivateDocs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'private_docs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'public_docs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Containers\\Vendor\\Documentation\\UI\\WEB\\Controllers\\Controller@showPublicDocs',
        'controller' => 'App\\Containers\\Vendor\\Documentation\\UI\\WEB\\Controllers\\Controller@showPublicDocs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'public_docs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.queries.explain' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_debugbar/queries/explain',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'as' => 'debugbar.queries.explain',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\QueriesController@explain',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
