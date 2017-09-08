function calcula(){
      var prob = document.getElementById('prob').value;
      var divide = prob/100;
      var valor_op = document.getElementById('valor_op').value; 
      document.getElementById('valor_est').value = parseFloat(divide)*parseFloat(valor_op);
    }



