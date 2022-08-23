<p>Ola, {{$user->first_name}}, </p>
<p>Seia bem-vindo ao {{config('app.name')}}. Por favor, verifique seu e-mail clicando no link abaixo. </p>

<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
    <tbody>
        <tr>
            <td align="center">
                <table role="presentation" border="0" ellpadding="0" cellspacing="0" >
                    <tbody>
                        <tr>
                            <td>
                                <a href="{{$verifyEmailLink}}" target="_blank">VERIFICAR E-MAIL</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </td>
        </tr>
    </tbody>

</table>

<p>Ou, simplemente copie e cole o link abaixo em seu navegador:</p>
<p> {{$verifyEmailLink}} </p>