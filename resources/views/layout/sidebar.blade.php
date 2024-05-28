<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Magnamedic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="icon" type="image/png" href="#">
</head>

<body>
<div id="wrapper">
<div class="sidebar">
    <div class="logo">
        <a href="/">
            <img src="#"
                 alt="Logo de Mi Empresa"/>
        </a>
    </div>
    <ul>
        <hr/>
        <li>
            <FontAwesomeIcon icon={solidIcons.faHome} class="iconSidebar"/>
            <a href="/"><span>Inicio</span></a>
        </li>
        <hr/>

        <li>
            <FontAwesomeIcon icon={solidIcons.faCalendar} class="iconSidebar"/>
            <a href="/medical-appointments"><span>Citas médicas</span></a>
        </li>
        <li>
            <FontAwesomeIcon icon={solidIcons.faUsers} class="iconSidebar"/>
            <a href="/patients">
                <span>Pacientes</span></a>
        </li>
        <hr/>

        <li>
            <FontAwesomeIcon icon={solidIcons.faStethoscope} class="iconSidebar"/>
            <a href="/doctors"><span>Médicos</span></a>
        </li>
        <li>
            <FontAwesomeIcon icon={solidIcons.faKitMedical} class="iconSidebar"/>
            <a href="/medical-specialities"><span>Especialidades médicas</span></a>
        </li>
        <hr/>

        <li>
            <FontAwesomeIcon icon={solidIcons.faUsers} class="iconSidebar"/>
            <a href="/users"><span>Usuarios</span></a>
        </li>
        <li>
            <FontAwesomeIcon icon={solidIcons.faChartArea} class="iconSidebar"/>
            <a href="/reports"><span>Reportes</span></a>
        </li>
    </ul>
</div>
