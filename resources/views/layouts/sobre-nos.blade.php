@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row div-fundo-principal">
      <div class="col-md-3">
         <div class="">
            <span class="">
               <svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#localizacao"/>
               </svg>Onde estamos</span>
               <p>Itaquera,Rua das Pedras,<br>345,CEP 83478-459  São Paulo SP</p>
         </div>
    </div>
      <section class="col-md-6 div-central-sobre-nos">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh elit, pellentesque ut iaculis nec, 
            sagittis quis arcu. Donec non varius felis. Ut cursus enim quis varius porta. Quisque aliquet posuere 
            turpis eu tristique. Duis nec turpis sed magna ultricies dictum a non velit. Aliquam non tellus eu 
            ligula egestas consequat in ut velit. Donec tempor tincidunt pretium.</p>

            <p>Aliquam fermentum at risus vel faucibus. Morbi nec fringilla ante. Nullam id sem at dolor volutpat 
            consectetur. Curabitur placerat, mauris quis fermentum condimentum, sapien risus pharetra nunc, 
            ac bibendum dolor nibh vel sem. Duis pellentesque vel sapien at congue. Phasellus gravida scelerisque
            magna et mattis. Vivamus risus elit, tristique in dui vel, aliquam rhoncus dolor. Nunc et mauris vitae 
            sapien eleifend cursus ac at leo. Praesent in massa ultrices, efficitur urna a, ullamcorper turpis. 
            Proin vitae bibendum ex. Ut nec lobortis turpis, ut ultrices neque. Sed aliquet, ante eleifend faucibus 
            convallis, metus ex tempor ex, ut egestas elit enim eu ligula. Morbi ut ex quis diam lacinia aliquam.</p>
		</section>
     <div class="col-md-3">
         <span class=""><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#horario"/></svg> Horário de atendimento</span>
             <p>de terça à Sexta das 18:00h às 22:00h / Sábado e domingo: 18:00h às 00:00h</p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/fale-conosco.js"></script>
@endsection