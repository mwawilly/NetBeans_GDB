@echo off

echo archive zip : %1
SET batchpath="%~dp0..\\"
echo destination : %batchpath%

set exe7z="C:\Program Files\7-Zip\7z.exe"
set dossiers=config src tests tmp webroot
IF exist %1 (
	for %%a in (%dossiers%) do (
	 	rd /S /Q %batchpath%%%a
	)
	%exe7z% x %1 -o%batchpath%
) ELSE (
	echo fichier parametre manquant !
)

pause