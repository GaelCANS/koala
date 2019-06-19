@extends('emails.layout')

@section('content')

    <table cellpadding="32" cellspacing="0" border="0" align="center" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: white; border-radius: 0.5rem; margin-bottom: 1rem;">
        <tr>
            <td width="546" valign="top" style="border-collapse: collapse;text-align: left">
                <div style="max-width: 600px; margin: 0 auto;text-align: left">

                    <div style="background: white;text-align: left; border-radius: 0.5rem; margin-bottom: 1rem;" align="">

                        Bonjour,
                        <br>
                        <br>
                        Des campagnes pour lesquelles votre service {{$service->name}} est contributeur viennent de se terminer.
                        <br>
                        Avez-vous pensé à aller renseigner vos indicateurs ?
                        <br>
                        <br>
                        Rendez-vous sur <a href="https://camp.cans.fr">https://camp.cans.fr</a>.
                    </div>

                </div>
            </td>
        </tr>
    </table>

@endsection