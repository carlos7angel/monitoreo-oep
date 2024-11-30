<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px"
           aria-describedby="forgot password">
        <tbody>
        <tr>
            <th align="center" valign="center" style="text-align:center; padding: 40px">
                <a rel="noopener" target="_blank" rel="noopener">
                    <img alt="Logo" src="{{ asset('themes/common/media/logos/logo_oep.png') }}" class="h-100px" />
                </a>
            </th>
        </tr>
        <tr>
            <td align="left" valign="center">
                <div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">

                    <div style="padding-bottom: 30px; font-size: 17px;">
                        <strong>Estimado usuario/a</strong>
                    </div>

                    <div style="padding-bottom: 30px">Está recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para su cuenta. Para continuar con el restablecimiento de la contraseña, haga clic en el siguiente botón:</div>

                    <div style="padding-bottom: 40px; text-align:center;">
                        <a href="{{$reseturl}}?email={{$email}}&token={{$token}}" rel="noopener" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#7239EA;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">Restablecer contraseña</a>
                    </div>

                    <div style="padding-bottom: 30px">Este enlace de restablecimiento de contraseña caducará en 60 minutos. Si no solicitó un restablecimiento de contraseña, no se requiere ninguna otra acción.</div>

                    <div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>

                    <div style="padding-bottom: 50px; word-wrap: break-all;">
                        <p style="margin-bottom: 10px;">¿El botón no funciona? Intente pegar esta URL en su navegador:</p>
                        <a href="{{$reseturl}}?email={{$email}}&token={{$token}}" rel="noopener" target="_blank" style="text-decoration:none;color: #7239EA">{{$reseturl}}?email={{$email}}&token={{$token}}</a>
                    </div>

                    <div style="padding-bottom: 10px">Saludos cordiales,<br><br></div>

                </div>
            </td>
        </tr>
        <tr>
            <td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                <p>Tribunal Supreo Electoral</p>
                <p>Copyright © <a href="#" rel="noopener" target="_blank">TSE</a>.</p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
