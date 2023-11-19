@extends('plantilla.layout')

@section('card-header')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2>Pacientes</h2>
        <a href="{{ route('crear-paciente') }}" class="btn btn-primary btn-sm btn-icon-split">
            <i class="fas fa-user-plus fa-sm"></i>
            Crear paciente
        </a>
    </div>
@endsection

@section('content')

    <div class="search-container">
        <input type="text" class="search-input" placeholder="Buscar...">
        <button class="search-button">Buscar</button>
    </div>

    <table class="styled-table">
        <thead>
        <tr>
            <th>Folio</th>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Fecha registro</th>
            <th style="width: 100px;">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>123456789</td>
            <td>Juan Pérez</td>
            <td>Maculino</td>
            <td>juanperez@mail.cm</td>
            <td>3013235689</td>
            <td>Calle 30 sur # 12-24</td>
            <td>2015-07-10 09:45:15</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>987654321</td>
            <td>María González</td>
            <td>Femenino</td>
            <td>mariagonzalez@mail.com</td>
            <td>3029876543</td>
            <td>Avenida 15 # 45-67</td>
            <td>2016-03-25 14:20:30</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>456789012</td>
            <td>Carlos Rodríguez</td>
            <td>Masculino</td>
            <td>carlosrodriguez@mail.com</td>
            <td>3048765432</td>
            <td>Carrera 25 # 34-56</td>
            <td>2017-11-18 11:10:45</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>234567890</td>
            <td>Javier Martínez</td>
            <td>Femenino</td>
            <td>javiermartinez@mail.com</td>
            <td>3090123456</td>
            <td>Diagonal 12 # 67-89</td>
            <td> 2019-09-12 17:45:10</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>345678901</td>
            <td>Laura González</td>
            <td>Femenino</td>
            <td>lauragonzalez@mail.com</td>
            <td>3112345678</td>
            <td>Avenida 30 # 89-01</td>
            <td>2020-02-28 10:15:55</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>567890123</td>
            <td>Sergio Ramírez</td>
            <td>Masculino</td>
            <td>sergioramirez@mail.com</td>
            <td>3134567890</td>
            <td>Calle 40 # 01-23</td>
            <td>2021-04-05 13:25:40</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>890123456</td>
            <td>Isabel Torres</td>
            <td>Masculino</td>
            <td>isabeltorres@mail.com</td>
            <td>3156789012</td>
            <td>Carrera 10 # 23-45</td>
            <td>2022-08-17 09:50:18</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>012345678</td>
            <td>Daniel Gómez</td>
            <td>Masculino</td>
            <td>danielgomez@mail.com</td>
            <td>3178901234</td>
            <td>Diagonal 22 # 45-67</td>
            <td>2023-01-30 15:30:05</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>543210987</td>
            <td>Carmen Vargas</td>
            <td>Femenino</td>
            <td>carmenvargas@mail.com</td>
            <td>3201234567</td>
            <td>Avenida 5 # 67-89</td>
            <td>2023-06-22 11:55:33</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>210987654</td>
            <td> Luis Medina</td>
            <td>Masculino</td>
            <td>luismedina@mail.com</td>
            <td>3223456789</td>
            <td>Calle 15 # 78-90</td>
            <td>2023-10-09 14:40:20</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        <tr>
            <td>11</td>
            <td>458913265</td>
            <td>Jorge Jimenez</td>
            <td>Masculino</td>
            <td>jorgejimenez@mail.com</td>
            <td>3201548768</td>
            <td>Carrera 44 # 21-36</td>
            <td>2019-11-18 11:07:45</td>
            <td>
                <a href="#" class="btn btn-warning btn-sm" title="Editar">
                    <i class="fas fa-edit fa-lg fa-lg"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" title="Eliminar">
                    <i class="fas fa-trash fa-lg fa-lg"></i>
                </a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
