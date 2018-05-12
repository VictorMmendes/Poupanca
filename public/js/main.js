$(document).ready(function()
{
    // $("input[type=checkbox]").on('change', function ()
    // {
    //     const check = $(this);
    //     const dados = check.attr('name').split('_');
    //     const label = "lb_" + dados[1];
    //
    //     if(check.prop('checked') == true)
    //     {
    //         $('#'+label).css("text-decoration", "line-through");
    //         arrayTarefas[dados[1]].status = 0;
    //     } else {
    //         $('#'+label).css("text-decoration", "none");
    //         arrayTarefas[dados[1]].status = 1;
    //     }
    // });
    //
    // $("input[type=checkbox]").each(function() {
    //     const check = $(this);
    //     const dados = check.attr('name').split('_');
    //     const label = "lb_" + dados[1];
    //
    //     if($(this).val() == 0)
    //     {
    //         $(this).prop('checked', true);
    //         $('#'+label).css("text-decoration", "line-through");
    //     } else {
    //         $('#'+label).css("text-decoration", "none");
    //     }
    // });

    $("#pessoaslista").on('click', function ()
    {
        // const check = $(this);
        // const dados = check.attr('name').split('_');
        // id = dados[1];
        //
        // window.location.assign("http://127.0.0.1:8000/");
        alert('oi');
    });
});
