function caracteres(){
    var max=new Number();
    max = 140;
    var atual = document.getElementById('mensagem').value.length;
    var rest = new Number();
    rest = max-atual;

    if(rest > 0){
        document.getElementById('restante').innerHTML=rest;
        document.getElementById('tweetar').disabled='';
    }else{
        document.getElementById('restante').innerHTML=rest;
        document.getElementById('tweetar').disabled='disabled';
    }
}
