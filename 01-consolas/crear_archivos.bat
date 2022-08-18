@ECHO OFF
FOR %%x IN (txt, js, php) DO (
  ECHO prueba > mis_archivos\prueba_1.%%x
  ECHO prueba > mis_archivos\prueba_2.%%x
)
