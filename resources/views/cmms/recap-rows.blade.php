@forelse($endeds as $ended)
    @include('cmms.next-row' , array('campaign' => $ended))
@empty
    <tr>
        <td>
            Aucune campagne
        </td>
    </tr>
@endforelse