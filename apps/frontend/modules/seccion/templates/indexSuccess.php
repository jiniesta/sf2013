<h1>Seccions List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipo</th>
      <th>Seccion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($seccions as $seccion): ?>
    <tr>
      <td><a href="<?php echo url_for('seccion/edit?id='.$seccion->getId()) ?>"><?php echo $seccion->getId() ?></a></td>
      <td><?php echo $seccion->getTipo() ?></td>
      <td><?php echo $seccion->getSeccion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('seccion/new') ?>">New</a>
