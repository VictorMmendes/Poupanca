@extends('principal')

@section('script')

<script type="text/javascript">
$(document).ready(function()
{
    $(".pessoa").each(function() {
        const check = $(this).attr('name');

        if($('#sal_'+check).val() < <?= ($media-100) ?>)
        {
            $('#status_' + check).css("color", "#fc605b");
        } else {
            $('#status_' + check).css("color", "#34c84a");
            $('#juros_' + check).val(<?= round(($total/$quantidade)*0.037, 2) ?>);
        }
    });

    $(".showInfo").click(function ()
    {
        const check = $(this).attr('name');
        window.location.assign("http://127.0.0.1:8000/pessoa/info/" + check);
    });
});
</script>

@stop

@section('conteudo')
<table class="table-striped">
  <thead>
    <tr>
        <th class="right_option"></th>
        <th>Pessoa</th>
        <th>Valor Depositado</th>
        <th>Juros</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pessoas as $pessoa)
        <tr>
            <td class="right_option pessoa" name="{{$pessoa->id}}">
                <span class="icon icon-record" id="status_{{ $pessoa->id }}"></span>
            </td>
            <td class="showInfo" name="{{$pessoa->id}}">{{ $pessoa->nome }}</td>
            <td>
                R$<input type="text" value="{{ round($pessoa->saldo,2) }}" name="{{$pessoa->id}}"
                class="saldo showInfo" id="sal_{{$pessoa->id }}" readonly>
            </td>
            <td class="showInfo" name="{{$pessoa->id}}">
                R$<input type="text" value="0.00" id="juros_{{$pessoa->id}}"
                class="saldo" readonly>
            </td>
        </tr>
    @endforeach
    <tr class="highlight">
        <td class="right_option pessoa">
            <span class="icon icon-record"></span>
        </td>
        <td>Total</td>
        <td>R${{ round($total, 2) }}</td>
        <td>R${{ round($total*0.037, 2) }}</td>
    </tr>
  </tbody>
</table>
@stop
