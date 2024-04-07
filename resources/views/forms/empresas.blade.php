<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<body class="bg-dark p-5 d-flex justify-center">
  <form action="{{route('Empresas-form')}}" class="row text-light bg-dark p-1 border-1 justify-center w-75 border boder-light rounded" method="POST">
     <div class="form-group form-check"> 
      <label for="exampleInputEmail1" class="text-ligth">Nome da empresa:</label>
      <input name="nome" type="text" class="form-control text-light bg-secondary w-50 p-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome da empresa">
    </div>
    <div class="form-group form-check">  
      <label for="exampleInputPassword1">Id da empresa</label>
      <input name="id" type="text" class="form-control text-light bg-secondary w-50 p-1" id="exampleInputPassword1" placeholder="Id da empresa">
    </div>
    <div class="form-group form-check">
      <label for="exampleInputPassword1">CNPJ</label>
      <input name="cnpj" type="text" class="form-control text-light bg-secondary w-50 p-1" id="exampleInputPassword1" placeholder="CNPJ">
    </div>
    <div class="form-group form-check">
      <label for="exampleInputPassword1">Latitude</label>
      <input name="latitude" type="text" class="form-control text-light bg-secondary w-50 p-1" id="exampleInputPassword1" placeholder="latitude">
    </div>
    <div class="form-group form-check">
      <label for="exampleInputPassword1">Longitude</label>
      <input name="longitude"  type="text" class="form-control text-light bg-secondary w-50 p-1" id="exampleInputPassword1" placeholder="longitude">
    </div>
    <div class="form-group form-check">
      <label for="exampleInputTextarea">Descrição</label>
      <input class="form-control text-light bg-secondary w-50 p-1 h-25" id="exampleFormControlTextarea1" rows="3">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Confirmar envio</label>
    </div>
    <button type="submit" class="btn btn-primary p-0" style="width: 80px;">Enviar</button>
  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>