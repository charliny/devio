var check = false;



$(document).ready(function(){

  function changeVal(el) {
    var qt = parseFloat(el.parent().children(".qt").html());
    var price = parseFloat(el.parent().children(".price").html());
    var eq = Math.round(price * qt * 100) / 100;
  
    el.parent().children(".full-price").html( eq + "$" );
    
    total = eq;
    changeTotal();			
  }
  
  function changeTotal() {
    
    var price = 0;
    
    $(".full-price").each(function(index){
      price += parseFloat($(".full-price").eq(index).html());
    });
    
    price = Math.round(price * 100) / 100;
    var fullPrice = Math.round(price * 100) / 100;
    
    if(price == 0) {
      fullPrice = 0;
    }
    
    $(".total span").html(fullPrice);
  }
  
  $(".remove").click(function(){
    var el = $(this);
    el.parent().parent().addClass("removed");
    window.setTimeout(
      function(){
        el.parent().parent().slideUp('fast', function() { 
          el.parent().parent().remove();
          if($(".product").length === 0) {
            if(check) {
              $("#cart").html("<h1>Pedido feito com Sucesso!</h1> <p>Seu pedido esta sendo preparado</p>");
            } else {
              $("#cart").html("<h1>No products!</h1>");
            }
          }
          changeTotal(); 
        });
      }, 200);
  });

  $(".qt-plus").click(function(){
    
    $(this).parent().children(".qt").html(parseInt($(this).parent().children(".qt").html()) + 1);
    
    $(this).parent().children(".full-price").addClass("added");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("added"); changeVal(el);}, 150);
  });
  
  $(".qt-minus").click(function(){
    
    child = $(this).parent().children(".qt");
    
    if(parseInt(child.html()) >= 1) {
      child.html(parseInt(child.html()) - 1);
    }
    
    $(this).parent().children(".full-price").addClass("minused");
    
    var el = $(this);
    window.setTimeout(function(){el.parent().children(".full-price").removeClass("minused"); changeVal(el);}, 150);
  });
  
  window.setTimeout(function(){$(".is-open").removeClass("is-open")}, 1200);
  
  $(".btn").click(function(){
    check = true;
    $(".remove").click();
  });
});