function enter(e) { //Tem que passar e como parâmetro 
    html=''
    for(let i = 0 ; i < e.value ; i++){
        teste = document.querySelector('#beneficiarios');
        html+= "<div class='col-md-6 mt-4'>"
        html+="    <label for='nome"+i+"' class='form-label'>Nome</label>"
        html+="    <input type='text' class='form-control' name='nome[]' id='nome"+i+"'>"
        html+="</div>"
        html+="<div class='col-md-6 mt-4'>"
        html+="    <label for='idade"+i+"' class='form-label'>Idade</label>"
        html+="    <input type='number' class='form-control' name='idade[]' id='idade"+i+"'>"
        html+="</div>"
        }
        teste.innerHTML = html;
}