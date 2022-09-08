$extensiones = 'txt', 'js', 'php'

foreach($ext in $extensiones) {
    $directorio = "archivos_$ext"
    New-Item -ItemType Directory .\mis_archivos\$directorio

    $archivos = Get-Item -Path .\mis_archivos\*.$ext
    foreach($arch in $archivos) {
        Move-Item $arch .\mis_archivos\$directorio
    }
}
