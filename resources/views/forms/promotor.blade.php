@extends('layouts.app')


<title> Promotor </title>

<h1 class="text-center"> Questionário do Promotor </h1>


@csrf
<div class ="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class ="form-control" name="nome" placeholder="digite um Nome">
                </div>
                <br>
                <div class ="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class ="form-control" name="email" placeholder="digite um Email">
                </div>
                <br>
                <div class ="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class ="form-control" name="telefone" placeholder="digite um Telefone">
                </div>
                <div class ="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class ="form-control" name="status" placeholder="digite um Status">
                </div>
                <br>
                <br>
                <div class ="form-group">
                    <input type="submit" nome="submit" class="btn btn-primary">
                </div>

            </form>
  </div>
