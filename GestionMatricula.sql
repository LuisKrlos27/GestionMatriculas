create table estudiantes(
id serial primary key,
nombre varchar(100) not null,
apellido varchar(100) not null,
documento bigint not null,
edad int,
direccion varchar(100),
telefono bigint,
correo varchar(50),
fecha_nacimiento date
);

create table programas(
id serial primary key,
nombre varchar(100) not null
);

create table materias(
id serial primary key,
nombre varchar(100),
codigo int not null,
id_programa int, 
foreign key (id_programa) references programas(id)
);

create table docentes(
id serial primary key,
nombre varchar(100) not null,
correo varchar(50),
titulo varchar(30)
);

create table matriculas(
id serial primary key,
id_estudiante int, foreign key (id_estudiante) references estudiantes(id),
id_materia int, foreign key (id_materia) references materias(id),
fecha_matricula date not null,
estado boolean default 'false'
);


create table materias_docente(
id serial primary key,
id_docente int, foreign key (id_docente) references docentes(id),
id_materia int, foreign key (id_materia) references materias(id),
semestre int not null
);

create table sedes(
id serial primary key,
nombre varchar(100) not null,
ciudad varchar(30) not null, 
codigo_postal int,
direccion varchar(100) not null,
telefono bigint
);

create table grupos(
id serial primary key,
nombre varchar(100) not null,
id_programa int, foreign key(id_programa) references programas(id),
id_sede int, foreign key(id_sede) references sedes(id)
);

create table horarios(
id serial primary key,
id_docente int, foreign key (id_docente ) references docentes(id),
id_sede int, foreign key(id_sede) references sedes(id),
id_materia int, foreign key (id_materia) references materias(id),
id_programa int, foreign key(id_programa) references programas(id),
horas int not null,
fecha_inicio date,
fecha_final date
);
--insertar valores a cada tabla 

insert into estudiantes(nombre,apellido,documento,edad,direccion,telefono,correo,fecha_nacimiento)
values('luis','escobar',1004618494,23,'la Ye',3245640874,'luisescobar@gmail.com','27-07-2001');

insert into estudiantes(nombre,apellido,documento,edad,direccion,telefono,correo,fecha_nacimiento)
values('carlos','vasquez',1194536298,18,'el pindo',3113822474,'carlosvasquez@gmail.com','24-09-2002');

insert into programas(nombre)
values('Ingeniera en sistemas');

insert into programas(nombre)
values('sociologia');

insert into materias(nombre,codigo,id_programa)
values('redes',1001,1);

insert into materias(nombre,codigo,id_programa)
values('programacion',1002,1);

insert into materias(nombre,codigo,id_programa)
values('metodologia de la investigacion',2001,2);

insert into materias(nombre,codigo,id_programa)
values('ciencias politicas',2002,2);

insert into docentes(nombre,correo,titulo)
values('hector','hector@gmail.com','ingeniero en sistemas');

insert into docentes(nombre,correo,titulo)
values('maria','maria@gmail.com','sociologa');

insert into matriculas(id_estudiante,id_materia,fecha_matricula)
values(1,1,'19-06-2025');

insert into matriculas(id_estudiante,id_materia,fecha_matricula)
values(2,4,'10-05-2025');

insert into materias_docente(id_docente,id_materia,semestre)
values(1,2,8);

insert into materias_docente(id_docente,id_materia,semestre)
values(2,3,4);

select * from matriculas

