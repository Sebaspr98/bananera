
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Base de datos: `usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
-- Aqui se guardaran los datos de los pedidos; el id del pedido, el nombre o titulo del pedido y un texto descriptivo del mismo
-- Adicionalmente contara con id del usuario que realice el pedido

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(256) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `titulo`, `texto`, `id_usuario`) VALUES
(31, 'pedido 1', '5 Cajas Premiun, 3 Cajas Normales', 3),
(35, 'pedido 2', '10 Cajas Premiun, 15 Cajas Normales', 3),
(36, 'pedido 3', '25 Cajas Premiun, 10 Cajas Normales', 4),
(38, 'pedido 12', '50 Cajas Premiun, 20 Cajas Normales', 4),
(39, 'pedido 23', '2 Cajas Premiun, 10 Cajas Normales', 4),
(40, 'pedido 30', '40 Cajas Premiun, 15 Cajas Normales', 4),
(41, 'pedido 33', '56 Cajas Premiun, 13 Cajas Normales', 4),
(51, 'pedido 50', '70 Cajas Premiun, 50 Cajas Normales', 3),
(53, 'pedido 62', '7 Cajas Premiun, 3 Cajas Normales', 3),
(54, 'pedido 170', '34 Cajas Premiun, 18 Cajas Normales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
-- Aquin se guardan los registros de los usuarios registrados en el sistema
-- su id, nombre, nombre de usuario y su contrasena
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `Tipo_Usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `contra`, `Tipo_Usuario`) VALUES
(1, 'sebastian molina', 'sebas', 'sebas', 'Administrador'),
(3, 'santiago molina', 'santiago', 'santiago', ''),
(4, 'juliana molina', 'juliana', 'juliana', ''),
(11, 'mas', 'mas', '1234567', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;
