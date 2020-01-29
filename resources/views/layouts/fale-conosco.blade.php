@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <p class="text-{{ $tipo ?? ''}} text-center"> {{ $msn ?? ''}}</p>
    @if (count($errors) > 0)
   <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
    @endif
  <div class="row div-fundo-principal">
      <div class="col-md-3">
        <div class="">
            <p class="text-left"><svg class="icon-email"><use xlink:href="icon-svg/categorias.svg#carta"/></svg>
           <small> contatoBig-Lanche-Delivery@gmail.com</small></p>
        </div>
    </div>
      <section class="col-md-6">
        <form action="/send-email"  method="post" name="form1" enctype="multipart/form-data" class="formulario-fale-conosco">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />            
            <div  class="input-field">
                <input id="nome" type="text" class="validate" name="nome" value="{{ old('nome') }}" >
                <label for="name">Nome</label>
            </div>
            <div class="input-field">
                <input id="telefone" type="text" class="validate" name="telefone" value="{{ old('telefone') }}" >
                <label for="telefone">Telefone</label>
          </div>
          <div class="input-field">
                <input id="email" type="text" class="validate" name="email" value="{{ old('email') }}" >
                <label for="email">E-mail</label>
          </div>
          <div class="input-field">
                <textarea class="validate" name="mensagem" id="msg" cols="30" rows="3" value="{{ old('mensagem') }}" ></textarea>
                <label for="msg">Mensagem</label>
          </div>
              <input class="buttom"  type="submit" value="enviar"/> 
              <input class="buttom"  type="reset"   value="limpar"/> 
          </form>
		   </section>
        <div class="col-md-3">
        <div class="div-right">
		       <p class=" telefone-formulario" style="text-shadow: 0.1em 0.1em 0.15em red">
              <svg class="icon-telefone"><use xlink:href="icon-svg/categorias.svg#telefone"/></svg>(11)95540-4040
           </p>
           <p class="whatsapp-formulario" style="text-shadow: 0.1em 0.1em 0.15em red;"> 
              <a  href="https://web.whatsapp.com/send?phone=5511946279867&text">
                <svg class="icon-whatsapp"><use xlink:href="icon-svg/categorias.svg#whatshap"/></svg>(11)995540-4040 
              </a>
           </p>
		   </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/fale-conosco.js"></script>
@endsection