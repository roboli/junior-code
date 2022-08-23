#!/bin/sh

for extension in txt js php
do
  directorio="archivos_${extension}"
  mkdir ./mis_archivos/$directorio

  for i in `ls ./mis_archivos/*.$extension`
  do
    mv $i ./mis_archivos/$directorio
  done
done
