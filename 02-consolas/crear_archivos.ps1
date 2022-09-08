$extensiones = 'txt', 'js', 'php'

foreach($ext in $extensiones) {
    Write-Output 'prueba' > .\mis_archivos\prueba_1.$ext
    Write-Output 'prueba' > .\mis_archivos\prueba_2.$ext
}
