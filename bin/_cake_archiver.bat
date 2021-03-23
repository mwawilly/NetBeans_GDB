@echo off
set exe7z="C:\Program Files\7-Zip\7z.exe"
set dossiers=config src tests tmp webroot

set jour=%date:~0,2%
set mois=%date:~3,2%
set annee=%date:~6,4%
set h=%time:~0,2%
if %h% lss 10 set h=0%h:~1,1%
set m=%time:~3,2%

set zip=projet_%annee%-%mois%-%jour%_%h%h%m%.zip
echo %zip%

for %%a in (%dossiers%) do (
    %exe7z% a %zip% ..\\%%a
)
pause