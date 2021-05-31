
function saveOs(){
    let valor = $("#edtValor").maskMoney("unmasked")[0]
    let dataInicio = $("#edtData").val()
    let service= $("#cbServico").val()
    let serviceName= $("#cbServico").text()

    let cliente= $("#cbCliente").val()
    let detento= $("#cbDetento").val()

    if(!dataInicio){
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Preencha o campo DATA'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;

    }
    if(!service){
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Selecione ou cadastre um Serviço'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;

    }
    if(!cliente){
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Selecione ou cadastre um Cliente'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;

    }
    if(!cliente){
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Selecione ou cadastre um Cliente'
            , footer: 'Qualquer dúvida entre em contato com o Suporte'
        });
        return;

    }

    let data = JSON.stringify({
        valor:valor,
        dataInicio:dataInicio,
        service:service,
        cliente:cliente,
        detento:detento,
        serviceName:serviceName

    })


    alert([data])

}


