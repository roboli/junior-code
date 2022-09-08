#!/bin/sh

for ext in txt js php
do
  directorio="archivos_${ext}"
  mkdir ./mis_archivos/$directorio

  for i in `ls ./mis_archivos/*.$ext`
  do
    mv $i ./mis_archivos/$directorio
  done
done
