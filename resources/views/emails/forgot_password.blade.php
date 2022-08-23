<p>Ola, {{$user->first_name}}, </p>
<p>Usted pidio un cambio de contrasena de su cuenta {{config('app.name')}}. Por favor click en el boton de abajo. </p>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
    <tbody>
        <tr>
            <td align="center">
                <table role="presentation" border="0" ellpadding="0" cellspacing="0" >
                    <tbody>
                        <tr>
                            <td>
                                <a href="{{$resetPasswordLink}}" target="_blank">Redefinir senha</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>

</table>

<p>Ou, simplemente copie e cole o link abaixo em seu navegador:</p>
<p> {{$resetPasswordLink}} </p>