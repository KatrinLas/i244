CREATE TABLE lasberg_loomaaed(
id INT( 3 ) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
nimi VARCHAR( 50 ) ,
vanus INT( 3 ) ,
liik VARCHAR( 50 ) ,
puur INT( 3 )
)

INSERT INTO lasberg_loomaaed(nimi, vanus, liik, puur ) 
VALUES (
'Kigoma',  7,  'ninasarvik',  1
)

INSERT INTO lasberg_loomaaed( nimi, vanus, liik, puur ) 
VALUES (
 'Kortes',  10,  'piison',  2
)

INSERT INTO lasberg_loomaaed( nimi, vanus, liik, puur ) 
VALUES (
 'Said',  '21',  'kaamel',  '3'
)

INSERT INTO lasberg_loomaaed( nimi, vanus, liik, puur ) 
VALUES (
 'Otto',  '12',  'lumeleopard',  '4'
)

INSERT INTO lasberg_loomaaed( nimi, vanus, liik, puur ) 
VALUES (
 'Nala',  '2',  'lumeleopard',  '4'
)

SELECT nimi, puur
FROM lasberg_loomaaed
WHERE PUUR =4

SELECT MAX( vanus ) , MIN( vanus ) 
FROM lasberg_loomaaed

SELECT puur, COUNT( nimi ) 
FROM lasberg_loomaaed
GROUP BY puur

UPDATE lasberg_loomaaed SET vanus = vanus +1