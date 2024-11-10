INSERT INTO `u_m_s`(`id`, `nombre`, `descripcion`, `abreviatura`, `estado`, `ref1`, `ref2`, `ref3`, `ref4`, `usuario_id`, `deleted_at`, `created_at`, `updated_at`)
VALUES
('1', 'Unidad', 'Unidad estándar', 'U', '1', 'Ref1-1', 'Ref1-2', 'Ref1-3', 'Ref1-4', '1', NULL, NOW(), NOW()),
('2', 'Litro', 'Medida de volumen', 'L', '1', 'Ref2-1', 'Ref2-2', 'Ref2-3', 'Ref2-4', '1', NULL, NOW(), NOW()),
('3', 'Metro', 'Medida de longitud', '1', '1', 'Ref3-1', 'Ref3-2', 'Ref3-3', 'Ref3-4', '1', NULL, NOW(), NOW()),
('4', 'Kilogramo', 'Medida de masa', 'kg', '1', 'Ref4-1', 'Ref4-2', 'Ref4-3', 'Ref4-4', '1', NULL, NOW(), NOW()),
('5', 'Segundo', 'Medida de tiempo', '1', '1', 'Ref5-1', 'Ref5-2', 'Ref5-3', 'Ref5-4', '1', NULL, NOW(), NOW()),
('6', 'Metro cuadrado', 'Medida de área', 'm²', '1', 'Ref6-1', 'Ref6-2', 'Ref6-3', 'Ref6-4', '1', NULL, NOW(), NOW()),
('7', 'Metro cúbico', 'Medida de volumen', 'm³', '1', 'Ref7-1', 'Ref7-2', 'Ref7-3', 'Ref7-4', '1', NULL, NOW(), NOW()),
('8', 'Metro por segundo', 'Medida de velocidad', 'm/s', '1', 'Ref8-1', 'Ref8-2', 'Ref8-3', 'Ref8-4', '1', NULL, NOW(), NOW()),
('9', 'Grado Celsius', 'Medida de temperatura', '°C', '1', 'Ref9-1', 'Ref9-2', 'Ref9-3', 'Ref9-4', '1', NULL, NOW(), NOW()),
('10', 'Kilogramo por metro cúbico', 'Densidad', 'kg/m³', '1', 'Ref10-1', 'Ref10-2', 'Ref10-3', 'Ref10-4', '1', NULL, NOW(), NOW()),
('11', 'Vatio', 'Potencia', 'W', '1', 'Ref11-1', 'Ref11-2', 'Ref11-3', 'Ref11-4', '1', NULL, NOW(), NOW()),
('12', 'Julio', 'Energía', 'J', '1', 'Ref12-1', 'Ref12-2', 'Ref12-3', 'Ref12-4', '1', NULL, NOW(), NOW()),
('13', 'Coulomb', 'Carga eléctrica', 'C', '1', 'Ref13-1', 'Ref13-2', 'Ref13-3', 'Ref13-4', '1', NULL, NOW(), NOW()),
('14', 'Newton', 'Fuerza', 'N', '1', 'Ref14-1', 'Ref14-2', 'Ref14-3', 'Ref14-4', '1', NULL, NOW(), NOW()),
('15', 'Hertz', 'Frecuencia', 'Hz', '1', 'Ref15-1', 'Ref15-2', 'Ref15-3', 'Ref15-4', '1', NULL, NOW(), NOW()),
('16', 'Amperio', 'Corriente eléctrica', 'A', '1', 'Ref16-1', 'Ref16-2', 'Ref16-3', 'Ref16-4', '1', NULL, NOW(), NOW()),
('17', 'Voltio', 'Diferencia de potencial', 'V', '1', 'Ref17-1', 'Ref17-2', 'Ref17-3', 'Ref17-4', '1', NULL, NOW(), NOW()),
('18', 'Ohmio', 'Resistencia eléctrica', 'Ω', '1', 'Ref18-1', 'Ref18-2', 'Ref18-3', 'Ref18-4', '1', NULL, NOW(), NOW()),
('19', 'Joule por Kelvin', 'Entropía', 'J/K', '1', 'Ref19-1', 'Ref19-2', 'Ref19-3', 'Ref19-4', '1', NULL, NOW(), NOW()),
('20', 'Lumen', 'Flujo luminoso', 'lm', '1', 'Ref20-1', 'Ref20-2', 'Ref20-3', 'Ref20-4', '1', NULL, NOW(), NOW());


INSERT INTO `bodegas`(`id`, `nombre`, `descripcion`, `ubicacion`, `estado`, `ref1`, `ref2`, `ref3`, `ref4`, `usuario_id`, `created_at`, `updated_at`)
VALUES
('1', 'Bodega A', 'Descripción de la Bodega A', 'Ubicación A', '1', 'Ref1-1', 'Ref1-2', 'Ref1-3', 'Ref1-4', '1', NOW(), NOW()),
('2', 'Bodega B', 'Descripción de la Bodega B', 'Ubicación B', '1', 'Ref2-1', 'Ref2-2', 'Ref2-3', 'Ref2-4', '1', NOW(), NOW()),
('3', 'Bodega C', 'Descripción de la Bodega C', 'Ubicación C', '1', 'Ref3-1', 'Ref3-2', 'Ref3-3', 'Ref3-4', '1', NOW(), NOW()),
('4', 'Bodega D', 'Descripción de la Bodega D', 'Ubicación D', '1', 'Ref4-1', 'Ref4-2', 'Ref4-3', 'Ref4-4', '1', NOW(), NOW()),
('5', 'Bodega E', 'Descripción de la Bodega E', 'Ubicación E', '1', 'Ref5-1', 'Ref5-2', 'Ref5-3', 'Ref5-4', '1', NOW(), NOW()),
('6', 'Bodega F', 'Descripción de la Bodega F', 'Ubicación F', '1', 'Ref6-1', 'Ref6-2', 'Ref6-3', 'Ref6-4', '1', NOW(), NOW()),
('7', 'Bodega G', 'Descripción de la Bodega G', 'Ubicación G', '1', 'Ref7-1', 'Ref7-2', 'Ref7-3', 'Ref7-4', '1', NOW(), NOW()),
('8', 'Bodega H', 'Descripción de la Bodega H', 'Ubicación H', '1', 'Ref8-1', 'Ref8-2', 'Ref8-3', 'Ref8-4', '1', NOW(), NOW()),
('9', 'Bodega I', 'Descripción de la Bodega I', 'Ubicación I', '1', 'Ref9-1', 'Ref9-2', 'Ref9-3', 'Ref9-4', '1', NOW(), NOW()),
('10', 'Bodega J', 'Descripción de la Bodega J', 'Ubicación J', '1', 'Ref10-1', 'Ref10-2', 'Ref10-3', 'Ref10-4', '1', NOW(), NOW());


INSERT INTO `clientes`(`id`, `nombres`, `apellidos`, `email`, `identificacion`, `telefono`, `direccion`, `ref1`, `ref2`, `ref3`, `ref4`, `estado`, `usuario_id`, `created_at`, `updated_at`)
VALUES
('1', 'Juan', 'Pérez', 'juan.perez@example.com', '123456789', '1234567890', 'Calle Principal 123', 'Ref1-1', 'Ref1-2', 'Ref1-3', 'Ref1-4', '1', '1', NOW(), NOW()),
('2', 'María', 'González', 'maria.gonzalez@example.com', '987654321', '0987654321', 'Avenida Libertad 456', 'Ref2-1', 'Ref2-2', 'Ref2-3', 'Ref2-4', '1', '1', NOW(), NOW()),
('3', 'Pedro', 'Martínez', 'pedro.martinez@example.com', '567891234', '5678901234', 'Plaza Mayor 789', 'Ref3-1', 'Ref3-2', 'Ref3-3', 'Ref3-4', '1', '1', NOW(), NOW()),
('4', 'Ana', 'López', 'ana.lopez@example.com', '345678912', '3456789012', 'Calle Sol 345', 'Ref4-1', 'Ref4-2', 'Ref4-3', 'Ref4-4', '1', '1', NOW(), NOW()),
('5', 'Carlos', 'Hernández', 'carlos.hernandez@example.com', '901234567', '9012345678', 'Avenida Central 678', 'Ref5-1', 'Ref5-2', 'Ref5-3', 'Ref5-4', '1', '1', NOW(), NOW()),
('6', 'Luisa', 'Sánchez', 'luisa.sanchez@example.com', '234567890', '2345678901', 'Calle Norte 901', 'Ref6-1', 'Ref6-2', 'Ref6-3', 'Ref6-4', '1', '1', NOW(), NOW()),
('7', 'Jorge', 'Rodríguez', 'jorge.rodriguez@example.com', '678901234', '6789012345', 'Avenida Sur 234', 'Ref7-1', 'Ref7-2', 'Ref7-3', 'Ref7-4', '1', '1', NOW(), NOW()),
('8', 'Laura', 'Gómez', 'laura.gomez@example.com', '456789012', '4567890123', 'Plaza Oeste 567', 'Ref8-1', 'Ref8-2', 'Ref8-3', 'Ref8-4', '1', '1', NOW(), NOW()),
('9', 'Mario', 'Díaz', 'mario.diaz@example.com', '789012345', '7890123456', 'Calle Este 890', 'Ref9-1', 'Ref9-2', 'Ref9-3', 'Ref9-4', '1', '1', NOW(), NOW()),
('10', 'Lucía', 'Martín', 'lucia.martin@example.com', '012345678', '0123456789', 'Avenida Poniente 123', 'Ref10-1', 'Ref10-2', 'Ref10-3', 'Ref10-4', '1', '1', NOW(), NOW()),
('11', 'Roberto', 'López', 'roberto.lopez@example.com', '543210987', '5432109876', 'Calle Libertad 456', 'Ref11-1', 'Ref11-2', 'Ref11-3', 'Ref11-4', '1', '1', NOW(), NOW()),
('12', 'Elena', 'Hernández', 'elena.hernandez@example.com', '987654321', '9876543210', 'Avenida Central 789', 'Ref12-1', 'Ref12-2', 'Ref12-3', 'Ref12-4', '1', '1', NOW(), NOW()),
('13', 'Pablo', 'Gómez', 'pablo.gomez@example.com', '876543210', '8765432109', 'Plaza Mayor 012', 'Ref13-1', 'Ref13-2', 'Ref13-3', 'Ref13-4', '1', '1', NOW(), NOW()),
('14', 'Adriana', 'Suárez', 'adriana.suarez@example.com', '654321098', '6543210987', 'Calle Norte 345', 'Ref14-1', 'Ref14-2', 'Ref14-3', 'Ref14-4', '1', '1', NOW(), NOW()),
('15', 'Javier', 'Martínez', 'javier.martinez@example.com', '765432109', '7654321098', 'Avenida Sur 678', 'Ref15-1', 'Ref15-2', 'Ref15-3', 'Ref15-4', '1', '1', NOW(), NOW()),
('16', 'Carmen', 'López', 'carmen.lopez@example.com', '234567890', '2345678901', 'Plaza Oeste 901', 'Ref16-1', 'Ref16-2', 'Ref16-3', 'Ref16-4', '1', '1', NOW(), NOW()),
('17', 'Diego', 'Díaz', 'diego.diaz@example.com', '890123456', '8901234567', 'Calle Este 234', 'Ref17-1', 'Ref17-2', 'Ref17-3', 'Ref17-4', '1', '1', NOW(), NOW()),
('18', 'Natalia', 'Sánchez', 'natalia.sanchez@example.com', '456789012', '4567890123', 'Avenida Poniente 567', 'Ref18-1', 'Ref18-2', 'Ref18-3', 'Ref18-4', '1', '1', NOW(), NOW()),
('19', 'Felipe', 'González', 'felipe.gonzalez@example.com', '012345678', '0123456789', 'Calle Libertad 890', 'Ref19-1', 'Ref19-2', 'Ref19-3', 'Ref19-4', '1', '1', NOW(), NOW()),
('20', 'Sofía', 'Hernández', 'sofia.hernandez@example.com', '543210987', '5432109876', 'Avenida Central 123', 'Ref20-1', 'Ref20-2', 'Ref20-3', 'Ref20-4', '1', '1', NOW(), NOW()),
('21', 'Andrés', 'Martín', 'andres.martin@example.com', '987654321', '9876543210', 'Plaza Mayor 456', 'Ref21-1', 'Ref21-2', 'Ref21-3', 'Ref21-4', '1', '1', NOW(), NOW()),
('22', 'Valeria', 'Gómez', 'valeria.gomez@example.com', '876543210', '8765432109', 'Calle Norte 789', 'Ref22-1', 'Ref22-2', 'Ref22-3', 'Ref22-4', '1', '1', NOW(), NOW()),
('23', 'Mateo', 'Suárez', 'mateo.suarez@example.com', '654321098', '6543210987', 'Avenida Sur 012', 'Ref23-1', 'Ref23-2', 'Ref23-3', 'Ref23-4', '1', '1', NOW(), NOW()),
('24', 'Eva', 'Martínez', 'eva.martinez@example.com', '765432109', '7654321098', 'Plaza Oeste 345', 'Ref24-1', 'Ref24-2', 'Ref24-3', 'Ref24-4', '1', '1', NOW(), NOW()),
('25', 'Gabriel', 'López', 'gabriel.lopez@example.com', '234567890', '2345678901', 'Calle Este 678', 'Ref25-1', 'Ref25-2', 'Ref25-3', 'Ref25-4', '1', '1', NOW(), NOW()),
('26', 'Luisana', 'Díaz', 'luisana.diaz@example.com', '890123456', '8901234567', 'Avenida Poniente 901', 'Ref26-1', 'Ref26-2', 'Ref26-3', 'Ref26-4', '1', '1', NOW(), NOW()),
mm