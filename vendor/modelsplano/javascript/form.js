function enter(e) {
    if(e.value > 10){
        e.value = 10;
    }
    html=''
    for(let i = 0 ; i < e.value ; i++){
        beneficiarios = document.querySelector('#beneficiarios');
        html +=
        `<div class='col-md-6 mt-4'>
            <label for='nome${i}' class='form-label'>Nome</label>
            <input type='text' class='form-control' name='nome[]' id='nome${i}' required>
        </div>
        <div class='col-md-6 mt-4'>
            <label for='idade${i}' class='form-label'>Idade</label>
            <input type='number' class='form-control' name='idade[]' id='idade${i}' required>
        </div>`
        }
        beneficiarios.innerHTML = html;
}