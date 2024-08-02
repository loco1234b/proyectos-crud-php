/*insertar*/
USE tabla_a_usar;
GO
IF OBJECT_ID('dbo.sp_insertar_usuario') IS NOT NULL
BEGIN /*verificar si el procedimiento almacenado existe y eliminarlo*/
    DROP PROCEDURE dbo.sp_insertar_usuario;
END
GO
CREATE PROCEDURE dbo.sp_insertar_usuario (
    @p_nombre VARCHAR(50),
    @p_apellidos VARCHAR(50),
    @p_email VARCHAR(50),
    @p_contraseña VARCHAR(60)
)
AS
BEGIN
    INSERT INTO usuario1 (nombre, apellidos, email, contraseña)
    VALUES (@p_nombre, @p_apellidos, @p_email, @p_contraseña); /*insertar valores a la tabla*/
END
GO

EXEC dbo.sp_insertar_usuario @p_nombre = 'Juan', @p_apellidos = 'Pérez', @p_email = 'juan.perez@example.com', @p_contraseña = 'contraseña123';/* metodo para ejucutar el procedimiento almacenado*/

/*modificar y actualizar*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_actualizar_usuario (
    @p_id INT,
    @p_nombre VARCHAR(50),
    @p_apellidos VARCHAR(50),
    @p_email VARCHAR(50),
    @p_contraseña VARCHAR(60)
)
AS
BEGIN
    UPDATE usuario1
    SET nombre = @p_nombre,
        apellidos = @p_apellidos,
        email = @p_email,
        contraseña = @p_contraseña
    WHERE id = @p_id;
END
GO
EXEC dbo.sp_actualizar_usuario @p_id = 1, @p_nombre = 'Juanito', @p_apellidos = 'Pérez González', @p_email = 'juanito.perez@example.com', @p_contraseña = 'nueva_contraseña';

/*eliminar*/

use tabla_a_usar;
go
create procedure dbo.sp_eliminar_usuario(
    @p_id INT
)
as 
BEGIN
   delete from usuario1 WHERE id = @p_id;
END
go

EXEC dbo.sp_eliminar_usuario @p_id = 1;

/*buscar*/
use tabla_a_usar;
go
create procedure dbo.sp_buscar_usuario(
    @p_id INT
)
as 
BEGIN
   select * from usuario1 WHERE id = @p_id;
END
go

EXEC dbo.sp_buscar_usuario @p_id = 1;

/*listar*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_listar_usuarios
AS
BEGIN
    SELECT * FROM usuario1;
END
GO
 EXEC dbo.sp_listar_usuarios;

/*contar todos los usuarios*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_contar_usuarios
AS
BEGIN
    SELECT COUNT(*) AS Total_Usuarios FROM usuario1;
END
GO
EXEC dbo.sp_contar_usuarios;

/* verificar si un usuario existe*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_verificar_usuario (
    @p_email VARCHAR(50)
)
AS
BEGIN
    IF EXISTS (SELECT 1 FROM usuario1 WHERE email = @p_email)
    BEGIN
        SELECT 'El usuario existe.' AS Mensaje;
    END
    ELSE
    BEGIN
        SELECT 'El usuario no existe.' AS Mensaje;
    END
END
GO
EXEC dbo.sp_verificar_usuario @p_email='aaron@gmail.com';

/*filtrar datos*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_filtrar_usuarios_por_edad (
    @p_edad_min INT,
    @p_edad_max INT
)
AS
BEGIN
    SELECT * FROM usuario1
    WHERE edad BETWEEN @p_edad_min AND @p_edad_max;/*beetween es para rangos*/
END
GO
EXEC dbo.sp_filtrar_usuarios_por_edad @p_edad_min = 18, @p_edad_max = 30;

/*insertar multiples tablas*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_insertar_varios_usuarios
    @usuarios TABLE (
        nombre VARCHAR(50),
        apellidos VARCHAR(50),
        email VARCHAR(50),
        contraseña VARCHAR(60)
    )
AS
BEGIN
    INSERT INTO usuario1 (nombre, apellidos, email, contraseña)
    SELECT nombre, apellidos, email, contraseña FROM @usuarios;
END
GO
DECLARE @nuevos_usuarios TABLE (
    nombre VARCHAR(50),
    apellidos VARCHAR(50),
    email VARCHAR(50),
    contraseña VARCHAR(60)
);

INSERT INTO @nuevos_usuarios (nombre, apellidos, email, contraseña)
VALUES 
('Ana', 'Gómez', 'ana.gomez@example.com', 'contraseñaAna'),
('Luis', 'Martínez', 'luis.martinez@example.com', 'contraseñaLuis');

EXEC dbo.sp_insertar_varios_usuarios @nuevos_usuarios;

/*manejo de errores*/
use tabla_a_usar;
go
CREATE PROCEDURE dbo.sp_actualizar_usuario_con_error (
    @p_id INT,
    @p_nombre VARCHAR(50),
    @p_apellidos VARCHAR(50),
    @p_email VARCHAR(50),
    @p_contraseña VARCHAR(60)
)
AS
BEGIN
    BEGIN TRY
        BEGIN TRANSACTION;

        UPDATE usuario1
        SET nombre = @p_nombre,
            apellidos = @p_apellidos,
            email = @p_email,
            contraseña = @p_contraseña
        WHERE id = @p_id;
/*COMMIT TRANSACTION: Confirma todos los cambios realizados en la transacción. Si todo se ejecuta correctamente, se aplican los cambios a la base de datos.*/
        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
/*ROLLBACK TRANSACTION: Si ocurre un error, se deshacen todos los cambios realizados durante la transacción.*/
        ROLLBACK TRANSACTION;
        /*Captura y muestra el mensaje de error*/
        SELECT ERROR_MESSAGE() AS ErrorMessage;
    END CATCH
END
GO
EXEC dbo.sp_actualizar_usuario_con_error @p_id = 1, @p_nombre = 'Juanito', @p_apellidos = 'Pérez González', @p_email = 'juanito.perez@example.com', @p_contraseña = 'nueva_contraseña';
/*crear un procedimiento que recupere el promedio de edad de las personas por cada departamento.*/
use tabla_a_usar;
go
CREATE PROCEDURE PromedioEdad
AS
BEGIN
    SELECT d.nombre_depa AS Departamento,
           AVG(e.edad) AS Promedio_Edad
    FROM empleado e
    INNER JOIN departamento d ON e.departamentoID = d.departamentoID
    GROUP BY d.nombre_depa;
END;
exec PromedioEdad
 

/* base de datos ejemplo
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    fecha_nacimiento DATE NOT NULL,
    sexo ENUM('Masculino', 'Femenino', 'Otro') NOT NULL,
    talla VARCHAR(10),
    contraseña VARCHAR(60) NOT NULL,
    foto_perfil BLOB, -- Puedes almacenar la foto como BLOB o la ruta del archivo
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

--Crear la tabla usuarios
CREATE TABLE usuarios (
    id INT IDENTITY(1,1) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    fecha_nacimiento DATE NOT NULL,
    sexo VARCHAR(10) CHECK (sexo IN ('Masculino', 'Femenino', 'Otro')) NOT NULL,
    talla VARCHAR(10),
    contraseña VARCHAR(60) NOT NULL,
    foto_perfil VARBINARY(MAX), -- Puedes almacenar la foto como VARBINARY o la ruta del archivo
    fecha_creacion DATETIME DEFAULT GETDATE()
);