/* Creación de la base de datos. */
create database bd_escuela;
use bd_escuela;
/* Creación de tabla escuela. */
create table tbl_escuelas(
    id_esc int auto_increment primary key not null,
    nom_esc varchar(30) not null,
    email_esc varchar(100) not null,
    telefono_esc char(9) not null,
    direccion_esc VARCHAR(150) not null
);
/* Creación de tabla cursos. */
create table tbl_cursos(
    id_curso int auto_increment primary key not null,
    nombre_curso varchar(90) not null,
    desccripcion_curso varchar(210) not null,
    horas_curso decimal(4,0) not null,
    turno_curso enum("mañana","tarde") not null,
    fk_id_esc int not null,
    fk_id_curso int null,
    fk_id_curso_requisit int null
);
/* Creación de tabla asignaturas. */
create table tbl_asignaturas(
    id_asigna int auto_increment primary key not null,
    nombre_asigna varchar(30) not null,
    aula_asigna varchar(15) not null,
    horas_asigna decimal(3,0) not null,
    fk_id_curso int not null
);
/* Creación de tabla intermedia entre asignaturas y profesores de que varios profesores pueden estar 
en varias asignaturas. */
create table tbl_asignaturas_profesores(
    id_asigna_profe int auto_increment primary key not null,
    funcion_asigna_profe enum("principal","apoyo"),
    fk_id_asigna int not null,
    fk_id_profe int not null
);
/* Creación de tabla profesor. */
create table tbl_profesores(
    id_profe int auto_increment primary key not null,
    nombre_profe varchar(25) not null,
    apellido_profe varchar(40) not null,
    email_profe varchar(100) not null,
    salario_profe decimal(8,2) not null,
    sexo_profe enum("Masculino","Femenino","Otro") not null,
    telefono_profe char(9) not null,
    DNI_profe char(9) not null,
    direccion_profe varchar(150) not null,
    fecha_contrato_profe date not null,
    fecha_nacimi_profe date not null
);
/* Creación de tabla alumnos. */
create table tbl_alumnos(
    matricula_alumno int auto_increment primary key not null,
    nombre_alumno varchar(25) not null,
    apellido_alumno varchar(40) not null,
    sexo_alumno enum("Masculino","Femenino","Otro"),
    email_alumno varchar(100) not null,
    telefono_alumno char(9) not null,
    DNI_alumno char(9)not null,
    direccion_alumno varchar(150) not null,
    fk_id_curso_alu int not null
);
/* Creación de foreign key de escuela a cursos. */
alter table `tbl_cursos`
    add constraint `fk_escuela_cursos` foreign key (`fk_id_esc`)
    references `tbl_escuelas` (`id_esc`);
/* Creación de foreign key de cursos que pueden ser requisitos de más cursos. */
alter table `tbl_cursos`
    add constraint `fk_curso_requisitos` foreign key (`fk_id_curso`)
    references `tbl_cursos` (`id_curso`);
alter table `tbl_cursos`
    add constraint `fk_curso_prerrequisitos` foreign key (`fk_id_curso_requisit`)
    references `tbl_cursos` (`id_curso`);
/* Creación de foreign key de cursos tiene muchas asignaturas. */
alter table `tbl_asignaturas`
    add constraint `fk_cursos_asignaturas` foreign key (`fk_id_curso`)
    references `tbl_cursos` (`id_curso`);
/* Creación de foreign key de muchos profesores pueden estar en muchas asignaturas. */
alter table `tbl_asignaturas_profesores`
    add constraint `fk_asignaturas_profesores` foreign key (`fk_id_profe`)
    references `tbl_profesores` (`id_profe`);
/* Creación de foreign key de en muchas asignaturas hay muchas profesores. */
alter table `tbl_asignaturas_profesores`
    add constraint `fk_asignaturas_profesores_ensenan` foreign key (`fk_id_profe`)
    references `tbl_profesores` (`id_profe`);
/* Creación de foreign key de en un curso hay mucho alumnos. */
alter table `tbl_alumnos`
    add constraint `fk_alumnos_curso` foreign key (`fk_id_curso_alu`)
    references `tbl_cursos` (`id_curso`);
/* Inserción de datos en tbl_escuelas. */
insert into tbl_escuelas values (null,'Pioneros','escolapioneros@gmail.com','649135684','Av. Mare de Déu de Bellvitge, 100, 110, 08907 L`Hospitalet de Llobregat, Barelona');
/* Inserción de datos en tbl_cursos. */
insert into tbl_cursos values (null,'1º Bachillerato Social','Aprende a comunicarte mejor.',1000,'mañana',1,null,null);
insert into tbl_cursos values (null,'2º Bachillerato Social','Aprende a comunicarte mejor.',1000,'mañana',1,1,null);
insert into tbl_cursos values (null,'1º Bachillerato Cientifico','Aprende a comunicarte mejor.',1000,'mañana',1,null,null);
insert into tbl_cursos values (null,'2º Bachillerato Cientifico','Aprende a comunicarte mejor.',1000,'tarde',1,3,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Medio Sistemas Microinformaticos y Redes 1','Desarrollen tareas de instalación, configuración y mantenimiento de sistemas microinformáticos.',1000,'mañana',1,null,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Medio Sistemas Microinformaticos y Redes 2','Funcionamiento y aplicando los protocolos de calidad, seguridad y respeto en el medio ambiente establecidos.',1000,'tarde',1,5,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Superior Administracion de Sistemas Informaticos y Redes 1','Desarrollen tareas de configuración, administración y mantenimiento de sistemas informáticos.',1000,'mañana',1,6,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Superior Administracion de Sistemas Informaticos y Redes 2','Aplicar y configurar aspectos de seguridad informática y sistemas de alta disponibilidad de recursos en red.',1000,'mañana',1,7,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Superior Desarrollo de Aplicaciones Webs 1','Desarrollen tareas de creación de aplicaciones Web utilizando diversos lenguajes de programación.',1000,'mañana',1,6,null);
insert into tbl_cursos values (null,'Ciclo Formativo Grado Superior Desarrollo de Aplicaciones Webs 2','Creación de aplicaciones Web en entorno cliente y en entorno servidor.',1000,'tarde',1,9,null);
/* Inserción de datos en tbl_alumnos. */
insert into tbl_alumnos values(null,'Alejandro','García','Masculino','alejandro_garcia@gmail.com','600112233','12345678A','Barcelona, Carrer de Balmes, 123',1);
insert into tbl_alumnos values(null,'Marta','López','Femenino','marta_lopez@hotmail.com','655443322','23456789B','Avinguda Diagonal, 456',5);
insert into tbl_alumnos values(null,'Pablo','Rodríguez','Masculino','pablo_rodriguez@gmail.com','691554433','34567890C','Barcelona, Carrer de Gràcia, 789',6);
insert into tbl_alumnos values(null,'Lucía','Martínez','Femenino','lucia_martinez@hotmail.com','633885577','45678901D','Carrer de Pau Claris, 1011',5);
insert into tbl_alumnos values(null,'Javier','Sánchez','Masculino','javier_sanchez@gmail.com','622998877','56789012E','Passeig de Sant Joan, 1213',9);
insert into tbl_alumnos values(null,'María','Pérez','Femenino','maria_perez@hotmail.com','677776655','67890123F','Carrer de Provença, 1415',2);
insert into tbl_alumnos values(null,'Daniel','González','Masculino','daniel_gonzalez@gmail.com','644556677','78901234G','Rambla de Catalunya, 1617',10);
insert into tbl_alumnos values(null,'Laura','Gómez','Femenino','laura_gomez@hotmail.com','688997766','89012345H',' Barcelona, Carrer de Mallorca, 1819',5);
insert into tbl_alumnos values(null,'Antonio','Ruiz','Masculino','antonio_ruiz@gmail.com','611223344','90123456J','Plaça de Catalunya, 2021',8);
insert into tbl_alumnos values(null,'Ana','Fernández','Otro','ana_fernandez@hotmail.com','633778899','01234567K','Carrer de Trafalgar, 2223',2);
insert into tbl_alumnos values(null,'Carlos','Hernández','Otro','carlos_hernandez@gmail.com','655667788','12345678L','Avinguda del Paral·lel, 2425',6);
insert into tbl_alumnos values(null,'Carmen','Jiménez','Femenino','carmen_jimenez@hotmail.com','677889900','23456789M','Carrer de la Marina, 2627',6);
insert into tbl_alumnos values(null,'David','Díaz','Masculino','david_diaz@gmail.com','611223344','34567890N','Carrer de Balmes, 2829',5);
insert into tbl_alumnos values(null,'Paula','Moreno','Femenino','paula_moreno@hotmail.com','681945824','45678901P','Barcelona, Carrer de Mallorca, 3031',9);
insert into tbl_alumnos values(null,'Sergio','Álvarez','Masculino','sergio_alvarez@gmail.com','688778899','56789012Q','Avinguda Diagonal, 3233',2);
insert into tbl_alumnos values(null,'Elena','Muñoz','Femenino','elena_munoz@hotmail.com','655334455','67890123R','Carrer de Sants, 3435',10);
insert into tbl_alumnos values(null,'Francisco','Romero','Masculino','francisco_romero@gmail.com','677889900','78901234S','Barcelona, Carrer de Gràcia, 3637',3);
insert into tbl_alumnos values(null,'Sara','Navarro','Femenino','sara_navarro@hotmail.com','641958014','89012345T','Barcelona, Rambla de Catalunya, 3839',4);
insert into tbl_alumnos values(null,'Juan','Torres','Masculino','juan_torres@gmail.com','644556677','90123456U','Carrer de Pau Claris, 4041',1);
insert into tbl_alumnos values(null,'Isabel','Domínguez','Femenino','isabel_dominguez@hotmail.com','688778899','01234567V','Carrer de Provença, 4243',8);
insert into tbl_alumnos values(null,'Miguel','Vázquez','Masculino','miguel_vazquez@gmail.com','633112233','12345678W','Passeig de Sant Joan, 4445',10);
insert into tbl_alumnos values(null,'Raquel','Ramos','Femenino','raquel_ramos@hotmail.com','644445566','23456789X','Barcelona, Avinguda del Paral·lel, 4647',9);
insert into tbl_alumnos values(null,'José','Gil','Masculino','jose_gil@gmail.com','688997766','34567890Y','Plaça de Catalunya, 4849',6);
insert into tbl_alumnos values(null,'Martina','Serrano','Otro','martina_serrano@hotmail.com','633556677','45678901Z','Carrer de Balmes, 5051',5);
insert into tbl_alumnos values(null,'Diego','Ortiz','Masculino','diego_ortiz@gmail.com','677889900','56789012A','Carrer de Mallorca, 5253',2);
insert into tbl_alumnos values(null,'Cristina','Marín','Femenino','cristina_marin@hotmail.com','692053945','67890123B','Carrer de Sants, 5455',3);
insert into tbl_alumnos values(null,'Alberto','Castro','Masculino','alberto_castro@gmail.com','644556677','78901234C','Rambla de Catalunya, 5657',7);
insert into tbl_alumnos values(null,'Nuria','Morales','Femenino','nuria_morales@hotmail.com','688778899','89012345D','Barcelona, Carrer de Gràcia, 5859',4);
insert into tbl_alumnos values(null,'Jesús','Bravo','Otro','jesus_bravo@gmail.com','633112233','90123456E','Carrer de Provença, 6061',9);
insert into tbl_alumnos values(null,'Beatriz','Molina','Femenino','beatriz_molina@hotmail.com','644445566','01234567F','Passeig de Sant Joan, 6263',8);
insert into tbl_alumnos values(null,'Álvaro','Rubio','Masculino','alvaro_rubio@gmail.com','688997766','12345678G','Avinguda Diagonal, 6465',7);
insert into tbl_alumnos values(null,'Julia','Delgado','Femenino','julia_delgado@hotmail.com','655334455','23456789H','Barcelona, Carrer de Balmes, 6667',1);
insert into tbl_alumnos values(null,'Ignacio','Ramírez','Otro','ignacio_ramirez@gmail.com','677889900','34567890J','Carrer de Mallorca, 6869',6);
insert into tbl_alumnos values(null,'Patricia','Ortega','Femenino','patricia_ortega@hotmail.com','633445566','45678901K','Carrer de Sants, 7071',4);
insert into tbl_alumnos values(null,'Manuel','Herrera','Masculino','manuel_herrera@gmail.com','644556677','56789012L','Barcelona, Rambla de Catalunya, 7273',2);
insert into tbl_alumnos values(null,'Clara','Castro','Femenino','clara_castro@hotmail.com','688778899','67890123M','Carrer de Gràcia, 7475',3);
insert into tbl_alumnos values(null,'Rubén','Suárez','Masculino','ruben_suarez@gmail.com','633112233','78901234N','Barcelona, Carrer de Pau Claris, 7677',10);
insert into tbl_alumnos values(null,'Alba','Cáceres','Femenino','alba_caceres@hotmail.com','644445566','89012345P','Carrer de Provença, 7879',7);
insert into tbl_alumnos values(null,'Fernando','Rivas','Masculino','fernando_rivas@gmail.com','688997766','90123456Q','Passeig de Sant Joan, 8081',4);
insert into tbl_alumnos values(null,'Lorena','Gallego','Femenino','lorena_gallego@hotmail.com','633556677','01234567R','Avinguda del Paral·lel, 8283',9);
insert into tbl_alumnos values(null,'Guillermo','Flores','Masculino','guillermo_flores@gmail.com','677889900','12345678S','Carrer de Balmes, 8485',1);
insert into tbl_alumnos values(null,'Adriana','Medina','Femenino','adriana_medina@hotmail.com','601935835','23456789T','Barcelona, Carrer de Mallorca, 8687',7);
insert into tbl_alumnos values(null,'Rafael','Calvo','Masculino','rafael_calvo@gmail.com','644556677','34567890U','Carrer de Sants, 8889',8);
insert into tbl_alumnos values(null,'Irene','León','Femenino','irene_leon@hotmail.com','688778899','45678901V','Barcelona, Rambla de Catalunya, 9091',3);
insert into tbl_alumnos values(null,'Luis','Vidal','Masculino','luis_vidal@gmail.com','633112233','56789012W','Carrer de Gràcia, 9293',10);
insert into tbl_alumnos values(null,'Elena','Parra','Femenino','elena_parra@hotmail.com','644445566','67890123X','Carrer de Pau Claris, 9495',8);
insert into tbl_alumnos values(null,'Gabriel','Iglesias','Masculino','gabriel_iglesias@gmail.com','688997766','78901234Y','Carrer de Provença, 9697',4);
insert into tbl_alumnos values(null,'Marina','Lozano','Femenino','marina_lozano@hotmail.com','655334455','89012345Z','Barcelona, Passeig de Sant Joan, 9899',7);
insert into tbl_alumnos values(null,'Víctor','Arias','Masculino','victor_arias@gmail.com','677889900','90123456A','Avinguda Carrilet, 3091',3);
insert into tbl_alumnos values(null,'Andrea','Carmona','Femenino','andrea_carmona@hotmail.com','649830038','01234567B','Carrer Rei en Jaume 3981',1);
insert into tbl_alumnos values(null,'Cesar','Aparicio','Masculino','Ce34_Apatt@hotmail.com','649830324','52692856T','Carrer La Rinconada, 454',1);
insert into tbl_alumnos values(null,'Robert','Chui,am','Masculino','Caffa_trra@hotmail.com','649525624','23586925Y','Avinguda Nova Cor, 12',1);
insert into tbl_alumnos values(null,'Josue','Silva','Masculino','jorg31gaf@hotmail.com','631945324','52641956T','Carrer Almirat, 842',1);
insert into tbl_alumnos values(null,'Ivana','Iturbe','Femenino','IvanittatrR@hotmail.com','674913845','02938473S','Passatge Bonavista 34',1);
insert into tbl_alumnos values(null,'Teresa','Calcuta','Femenino','Tvrlu@hotmail.com','694813045','87319403U','Carrer Besos, 9284',1);
insert into tbl_alumnos values(null,'Anibal','Caracruz','Masculino','JAdpvn134@hotmail.com','684012345','94820193H','Carrer Manzanal, 43',2);
insert into tbl_alumnos values(null,'Jack','Smith','Masculino','HombrJackson3@hotmail.com','640133819','83912345I','Carrer de Joan Jaume, 527',2);
insert into tbl_alumnos values(null,'Camila','Sanchez','Femenino','Stri43mvCami@hotmail.com','693023495','39104938Y','Avinguda Alcatraz, 235',2);
insert into tbl_alumnos values(null,'Carl','Terron','Masculino','CarlTorres913@hotmail.com','630149583','29184392K','Passatge Carrefour, 523',2);
insert into tbl_alumnos values(null,'Issac','Montenegro','Masculino','Monte_Isac4@hotmail.com','649103945','73190345N','Carrer de Canyet, 413',2);
insert into tbl_alumnos values(null,'Alex','Chuspi','Femenino','AlexitaXChustr2@hotmail.com','648104938','48193849H','Urbanizacio Mirror Alta, 24',3);
insert into tbl_alumnos values(null,'Cristina','Villaforta','Femenino','fortAlezaCris2@hotmail.com','648193045','29401493F','Carrer DomaRes, 732',3);
insert into tbl_alumnos values(null,'Diego','Arco','Masculino','fanb__Arco@hotmail.com','618401935','01495439X','Carrer Mataro, 713',3);
insert into tbl_alumnos values(null,'Xavi','Moreno','Masculino','@hotmail.com','619504814','81501495A','Passatge de Madrilta, 175',3);
insert into tbl_alumnos values(null,'Alva','Casadecruz','Masculino','CasaAlva4r@hotmail.com','649104935','31484914S','Carrer Zaragoza, 3571',3);
insert into tbl_alumnos values(null,'Jose','Mantos','Masculino','Mantjosesitos@hotmail.com','638194837','74910394Z','Barcelona, Carrer Aragon, 17',4);
insert into tbl_alumnos values(null,'Sebastian','Rosales','Masculino','sebasRosaTingo@hotmail.com','693019384','52958414C','Hospitalet d`Llobregat, Passatge Ferro, 634',4);
insert into tbl_alumnos values(null,'Kiko','Alvarez','Masculino','Alva_Kikii613@hotmail.com','638103945','34194857R','Badalona, Carrer Grecia, 613',4);
insert into tbl_alumnos values(null,'Rosa','Castro','Femenino','TRotacvi13@hotmail.com','618493840','14874618V','Sant Cugat, Carrer Terraria, 168',4);
insert into tbl_alumnos values(null,'Miranda','Rodalies','Femenino','FerRodamir12@hotmail.com','612948391','71249824G','Barcelona, Passatge Vivanco, 761',4);
insert into tbl_alumnos values(null,'Grisel','Garcia','Femenino','GriGa_la@hotmail.com','619847581','19483474P','Carrer Roca Fort, 46',5);
insert into tbl_alumnos values(null,'Fidel','Churruca','Masculino','fideLChurru@hotmail.com','691045924','49183453H','Avinguda Venezuela, 164',5);
insert into tbl_alumnos values(null,'Maritza','Naranjo','Femenino','ritzaArtNarajo@hotmail.com','674918452','93817462F','Carrer de Pau Claris, 274',5);
insert into tbl_alumnos values(null,'Iker','Ceprian','Masculino','cepriKer@hotmail.com','643918405','84173647B','Passatge Cornella',5);
insert into tbl_alumnos values(null,'Yeiner','Miran','Masculino','Rannerr4@hotmail.com','601495837','28491836N','Carrer Cruz Red, 57',5);
insert into tbl_alumnos values(null,'Francisca','Aronson','Femenino','AronFranc@gmail.com','648195024','71462565S','Urbanizacio Torrezca, 25',6);
insert into tbl_alumnos values(null,'Teororo','Jimenez','Masculino','TesoroJim@gmail.com','654914059','84719403X','Avinguda Nova mar, 235',6);
insert into tbl_alumnos values(null,'Yanire','Carmona','Femenino','RecaRmona@gmail.com','614859145','91349518C','Passatge Yinga, 2356',6);
insert into tbl_alumnos values(null,'Thomas','Fuentes','Masculino','FuentesInventes@gmail.com','690145928','19483745F','Carrer de Millora, 1235',6);
insert into tbl_alumnos values(null,'Jazmin','Iparra','Femenino','RRazminR@gmail.com','601948571','28539481B','Carrer Girona, 13',6);
insert into tbl_alumnos values(null,'Jessica','Moran','Femenino','JessMorat@hotmail.com','624948105','52859184S','Carrer Manzanal, 145',7);
insert into tbl_alumnos values(null,'Grecia','Vallejos','Femenino','TacheValle@hotmail.com','64910495','48592450K','Carrer de Rio proba, 15',7);
insert into tbl_alumnos values(null,'Lucia','Torrejon','Femenino','TerrunCia@hotmail.com','618495024','19485493P','Passatge San Joan, 263',7);
insert into tbl_alumnos values(null,'Martin','Guzman','Masculino','GuzmanTan@hotmail.com','660384758','48294857T','Avinguda Continental, 76',7);
insert into tbl_alumnos values(null,'Hiro','Kirama','Masculino','HiroKInogama@hotmail.com','648592857','25849185A','Carrer Vidal, 24',7);
insert into tbl_alumnos values(null,'Maria','Nando','Femenino','MM_ando@hotmail.com','610495814','13648574I','Carrer de Pau Claris, 16',8);
insert into tbl_alumnos values(null,'Junior','Manzanal','Masculino','ManzanaJu@hotmail.com','604593853','58295817L','Calle Paris, 72',8);
insert into tbl_alumnos values(null,'Paul','Frinco','Masculino','PolacoJens@hotmail.com','661948573','25839481K','Carrer Villa Franca, 263',8);
insert into tbl_alumnos values(null,'Trinit','Llevet','Femenino','LlevetTy@hotmail.com','601394854','53928474C','Passatge Anibal Vidal, 274',8);
insert into tbl_alumnos values(null,'Fiorella','Alhoja','Femenino','FioRojasA@hotmail.com','614594857','58174819R','Avinguda Llelamos, 38',8);
insert into tbl_alumnos values(null,'Sergio','Barras','Masculino','Srgi_roro@hotmail.com','648294857','51748573F','Avinguda Andaluz, 57',9);
insert into tbl_alumnos values(null,'Micaela','Bastidas','Femenino','MikaSeria@hotmail.com','620495837','24695837H','Avinguda VillaFranka, 256',9);
insert into tbl_alumnos values(null,'Oscar','Montoya','Masculino','OscarinPRime@hotmail.com','615948593','47383857X','Avinguda Nou Park, 735',9);
insert into tbl_alumnos values(null,'Frank','Tuesta','Masculino','Frankaska@hotmail.com','651834958','26443613Z','Carrer Union, 59',9);
insert into tbl_alumnos values(null,'Andalucia','Sotomayor','Femenino','SotomarrrLucia@hotmail.com','613584295','13648357K','Passatge Yugos, 237',9);
insert into tbl_alumnos values(null,'Luz','Salgado','Femenino','Luzdelcamino@gmail.com','681495817','51357184Y','Rambla Marina, 1617',10);
insert into tbl_alumnos values(null,'Daniela','Frank','Femenino','FKdANIeLITA@gmail.com','693817483','74817364T','Rambla Nova estacio, 1617',10);
insert into tbl_alumnos values(null,'Tatiana','Villacorta','Femenino','VillatrtrTatit@gmail.com','648193847','52918357G','Rambla del Miro, 1617',10);
insert into tbl_alumnos values(null,'Muriel','Linca','Femenino','LincaMu@gmail.com','613847589','62958173D','Carrer Bonaventura, 1617',10);
insert into tbl_alumnos values(null,'Ivonne','Bohorquez','Femenino','FerIvonne@gmail.com','683194857','79183746K','Rambla Catalana, 1617',10);
/* Inserción de datos en tbl_asignaturas. */
insert into tbl_asignaturas values(null,'Economía','Aula 203',78,1);
insert into tbl_asignaturas values(null,'Literatura Universal','Aula 203',90,1);
insert into tbl_asignaturas values(null,'Latín I','Aula 111',45,1);
insert into tbl_asignaturas values(null,'Latín II','Aula 111',60,2);
insert into tbl_asignaturas values(null,'Economía de la Empresa','Aula 326',110,2);
insert into tbl_asignaturas values(null,'Geografía','Aula 326',55,2);
insert into tbl_asignaturas values(null,'Historia de España','Aula 326',70,3);
insert into tbl_asignaturas values(null,'Lengua Castellana y Literatura','Aula 127',85,3);
insert into tbl_asignaturas values(null,'Matemáticas','Aula 130',120,3);
insert into tbl_asignaturas values(null,'Biología','Laboratio 2',60,4);
insert into tbl_asignaturas values(null,'Física','Aula 130',80,4);
insert into tbl_asignaturas values(null,'Primera Lengua Extranjera','Aula 201',54,4);
insert into tbl_asignaturas values(null,'M2 sistemas operativos','Aula 201',78,5);
insert into tbl_asignaturas values(null,'M5 Redes','Aula 201',60,5);
insert into tbl_asignaturas values(null,'M1 Montaje','Aula 210',65,5);
insert into tbl_asignaturas values(null,'M3 Ofimatica','Aula 210',50,6);
insert into tbl_asignaturas values(null,'M6 Seguridad','Aula 210',90,6);
insert into tbl_asignaturas values(null,'M9 Fol','Aula 210',45,6);
insert into tbl_asignaturas values(null,'M2 Base de datos','Aula 301',80,7);
insert into tbl_asignaturas values(null,'M3 Programación','Aula 301',100,7);
insert into tbl_asignaturas values(null,'M5 Entornos','Aula 301',80,7);
insert into tbl_asignaturas values(null,'M1 Sistemas operativos','Aula 305',90,8);
insert into tbl_asignaturas values(null,'M11 Seguridad','Aula 142',305,8);
insert into tbl_asignaturas values(null,'M10 Base de datos','Aula 143',305,8);
insert into tbl_asignaturas values(null,'M7 Desarrollo Web Servidor','Aula204',70,9);
insert into tbl_asignaturas values(null,'M3 Orientación a objetos','Aula 206',80,9);
insert into tbl_asignaturas values(null,'M6 Diseño Web cliente','Aula 204',105,9);
insert into tbl_asignaturas values(null,'M8 Servicios','Aula 204',70,10);
insert into tbl_asignaturas values(null,'M2_4 Base de datos','Aula 206',65,10);
insert into tbl_asignaturas values(null,'M9 Diseños de páginas','Aula 206',110,10);
/* Inserción de datos en tbl_profesores. */
insert into tbl_profesores values (null,'Sofía','García','gar32fia@gmail.com',2400,'Femenino','649830038','99887766K','Carrer de Barcelona, 3233, Hospitalet','2012-04-12','1983-09-19');
insert into tbl_profesores values (null,'Martín','Martínez','72lmartiz3@outlook.com',1800,'Masculino','649245194','88776655L','Avinguda de la Generalitat, 3031, Sant Boi','2016-09-24','2987-04-12');
insert into tbl_profesores values (null,'Valentina','López','tina__lo02@hotmail.com',2000,'Femenino','629391847','77665544M','Carrer de Ramon Llull, 2829, Sant Boi','2015-11-18','1991-04-09');
insert into tbl_profesores values (null,'Alejandro','Rodríguez','alejommro@gmail.com',2150,'Masculino','601394814','55667788N','Avinguda dels Països Catalans, 2627, Hospitalet','2002-03-27','1979-12-04');
insert into tbl_profesores values (null,'Lucía','Pérez','luaciPerzrt@outlook.com',2500,'Femenino','649140593','44556677P','Carrer de la Riera Blanca, 2425, Hospitalet','2013-12-05','1984-05-30');
insert into tbl_profesores values (null,'Mateo','Gómez','attrmatezz@hotmail.com',2250,'Masculino','675145938','33445566Q','Carrer del Mig, 2223, Hospitalet','2008-04-01','1982-01-31');
insert into tbl_profesores values (null,'Isabella','Sánchez','sancIsabbr@gmail.com',2100,'Femenino','673918457','22334455R','Plaça de Catalunya, 2021, Barcelona','2011-06-30','1990-05-27');
insert into tbl_profesores values (null,'Lucas','González','luc12gont@outlook.com',1950,'Masculino','675483190','11223344S','Carrer de l`Església, 1819, Cornellà','2023-12-13','1987-02-22');
insert into tbl_profesores values (null,'Emma','Romero','romemmay@hotmail.com',2000,'Femenino','638104958','09876543T','Carrer de Sant Ildefons, 1617, Cornellà','2015-05-15','1974-08-20');
insert into tbl_profesores values (null,'Santiago','Fernández','santi_tfervg@gmail.com',3120,'Masculino','674910319','98765432U','Avinguda del Paral·lel, 1415, Barcelona','2006-03-24','1970-01-19');
insert into tbl_profesores values (null,'Valeria','Díaz','valeDia_zz@outlook.com',2300,'Femenino','619304193','87654321V','Carrer de Sant Joan, 1213, Barcelona','2014-07-17','1982-04-11');
insert into tbl_profesores values (null,'Daniel','Moreno','daniMoRenoyt1@hotmail.com',1850,'Masculino','649103491','76543210W','Carrer de la Rambla, 1011, Barcelona','2009-12-21','1988-06-01');
insert into tbl_profesores values (null,'Camila','Álvarez','cammTelava@gmail.com',2050,'Femenino','681094285','65432109X','Carrer de Gràcia, 789, Barcelona','2018-04-13','1972-11-18');
insert into tbl_profesores values (null,'Nicolás','Torres','nicoToreres56@outlook.com',1970,'Masculino','674013495','54321098Y','Avinguda Diagonal, 456, Barcelona','2013-05-15','1981-04-21');
insert into tbl_profesores values (null,'Mia','Ruiz','miaaa_ruiz4@hotmail.com',2140,'Femenino','659235094','43210987Z','Carrer de Balmes, 123, Barcelona','2016-08-12','1985-12-05');
insert into tbl_profesores values (null,'Mark','Villarelas','471fMarkvilla@gmail.com',1950,'Masculino','684928456','47829456G','Avinguda Carrilet, 374, Hospitalet','2018-09-11','1988-05-12');
insert into tbl_profesores values (null,'Jose','Sanchez','SanchezzzJorg@outlook.com',2005,'Masculino','684903184','87463913T','Passatge Jaume Roig 170, Barcelona','2014-08-16','1984-09-07');
insert into tbl_profesores values (null,'Fatima','Hernandez','HHfatizu5@hotmail.com',2150,'Femenino','674910293','47391034P','Carrer L`emigrant, 24, Hospitalet','2017-01-18','1983-09-27');
/* Inserción de datos en tbl_asginaturas_profesores. */
insert into tbl_asignaturas_profesores values(null,'principal',1,4);
insert into tbl_asignaturas_profesores values(null,'apoyo',1,17);
insert into tbl_asignaturas_profesores values(null,'principal',2,7);
insert into tbl_asignaturas_profesores values(null,'principal',3,15);
insert into tbl_asignaturas_profesores values(null,'principal',4,15);
insert into tbl_asignaturas_profesores values(null,'apoyo',4,17);
insert into tbl_asignaturas_profesores values(null,'principal',5,4);
insert into tbl_asignaturas_profesores values(null,'principal',6,4);
insert into tbl_asignaturas_profesores values(null,'principal',7,15);
insert into tbl_asignaturas_profesores values(null,'apoyo',7,7);
insert into tbl_asignaturas_profesores values(null,'principal',8,7);
insert into tbl_asignaturas_profesores values(null,'principal',9,12);
insert into tbl_asignaturas_profesores values(null,'apoyo',9,4);
insert into tbl_asignaturas_profesores values(null,'principal',10,15);
insert into tbl_asignaturas_profesores values(null,'principal',11,12);
insert into tbl_asignaturas_profesores values(null,'principal',12,15);
insert into tbl_asignaturas_profesores values(null,'apoyo',12,17);
insert into tbl_asignaturas_profesores values(null,'principal',13,6);
insert into tbl_asignaturas_profesores values(null,'apoyo',13,1);
insert into tbl_asignaturas_profesores values(null,'principal',14,5);
insert into tbl_asignaturas_profesores values(null,'apoyo',14,16);
insert into tbl_asignaturas_profesores values(null,'principal',15,11);
insert into tbl_asignaturas_profesores values(null,'principal',16,2);
insert into tbl_asignaturas_profesores values(null,'principal',17,18);
insert into tbl_asignaturas_profesores values(null,'apoyo',17,3);
insert into tbl_asignaturas_profesores values(null,'principal',18,16);
insert into tbl_asignaturas_profesores values(null,'principal',19,10);
insert into tbl_asignaturas_profesores values(null,'apoyo',19,8);
insert into tbl_asignaturas_profesores values(null,'principal',20,3);
insert into tbl_asignaturas_profesores values(null,'apoyo',20,5);
insert into tbl_asignaturas_profesores values(null,'principal',21,14);
insert into tbl_asignaturas_profesores values(null,'apoyo',21,1);
insert into tbl_asignaturas_profesores values(null,'principal',22,13);
insert into tbl_asignaturas_profesores values(null,'apoyo',22,9);
insert into tbl_asignaturas_profesores values(null,'principal',23,11);
insert into tbl_asignaturas_profesores values(null,'apoyo',23,5);
insert into tbl_asignaturas_profesores values(null,'principal',24,8);
insert into tbl_asignaturas_profesores values(null,'apoyo',24,10);
insert into tbl_asignaturas_profesores values(null,'principal',25,9);
insert into tbl_asignaturas_profesores values(null,'apoyo',25,14);
insert into tbl_asignaturas_profesores values(null,'principal',26,1);
insert into tbl_asignaturas_profesores values(null,'apoyo',26,13);
insert into tbl_asignaturas_profesores values(null,'principal',27,18);
insert into tbl_asignaturas_profesores values(null,'apoyo',27,5);
insert into tbl_asignaturas_profesores values(null,'principal',28,9);
insert into tbl_asignaturas_profesores values(null,'apoyo',28,2);
insert into tbl_asignaturas_profesores values(null,'principal',29,8);
insert into tbl_asignaturas_profesores values(null,'principal',29,10);
insert into tbl_asignaturas_profesores values(null,'apoyo',29,5);
insert into tbl_asignaturas_profesores values(null,'principal',30,18);
insert into tbl_asignaturas_profesores values(null,'apoyo',30,3);
select * from tbl_profesores;