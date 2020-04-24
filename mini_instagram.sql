CREATE TABLE persona(
    id int auto_increment not null,
    nombre VARCHAR (40) not null,
    apellido VARCHAR(40) not null,
    email VARCHAR(250) not null,
    clave VARCHAR(250) not null,
    CONSTRAINT pk_persona PRIMARY KEY(id)
);

CREATE TABLE usuario(
    id int auto_increment not null,
    apodo VARCHAR(50) not null,
    avatar blob,
    idPersona int not NULL,
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT fk_usuario_persona FOREIGN KEY(idPersona) REFERENCES persona(id)
);

CREATE TABLE imagen(
    id int auto_increment not null,
    nombre VARCHAR(50) not null,
    descripcion VARCHAR(300),
    foto VARCHAR(300),
    idUsuario int not null,
    creado_el datetime,
    CONSTRAINT pk_imagen PRIMARY KEY(id),
    CONSTRAINT fk_imagen_usuario FOREIGN KEY(idUsuario) REFERENCES usuario(id)
);

CREATE TABLE album(
    id int auto_increment not null,
    nombre VARCHAR(50) not null,
    descripcion VARCHAR(300),
    idImagen int not null,
    creado_el datetime,
    CONSTRAINT pk_album PRIMARY KEY(id),
    CONSTRAINT fk_album_imagen FOREIGN KEY(idIamgen) REFERENCES imagen(id)
);

CREATE TABLE imagenXalbum(
    numOrden int,
    idImagen int not null,
    idAlbum int not null,
    CONSTRAINT fk_imagen_numeroOrden FOREIGN KEY(idImagen) REFERENCES imagen(id),
    CONSTRAINT fk_album_numeroOrden FOREIGN KEY(idAlbum) REFERENCES album(id)
);

CREATE TABLE comentarioImagen(
    id int auto_increment not null,
    descripcion VARCHAR(300),
    idImagen int not null,
    idUsuario int not null,
    creado_el datetime,
    CONSTRAINT pk_comentarioImagen PRIMARY KEY(id),
    CONSTRAINT fk_comentarioImagen_imagen FOREIGN KEY(idIamgen) REFERENCES imagen(id),
    CONSTRAINT fk_comentarioImagen_usuario FOREIGN KEY(idUsuario) REFERENCES usuario(id)
);

CREATE TABLE comentarioAlbum(
    id int auto_increment not null,
    descripcion VARCHAR(300),
    idAlbum int not null,
    idUsuario int not null,
    creado_el datetime,
    CONSTRAINT pk_comentarioImagen PRIMARY KEY(id),
    CONSTRAINT fk_comentarioImagen_album FOREIGN KEY(idAlbum) REFERENCES album(id),
    CONSTRAINT fk_comentarioImagen_usuario FOREIGN KEY(idUsuario) REFERENCES usuario(id)
);



