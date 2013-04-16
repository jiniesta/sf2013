<h1>Noticias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo</th>
      <th>Subtitulo</th>
      <th>Texto</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($noticias as $noticia): ?>
    <tr>
      <td><a href="<?php echo url_for('noticia/edit?id='.$noticia->getId()) ?>"><?php echo $noticia->getId() ?></a></td>
      <td><?php echo $noticia->getTitulo() ?></td>
      <td><?php echo $noticia->getSubtitulo() ?></td>
      <td><?php echo $noticia->getTexto() ?></td>
      <td><?php echo $noticia->getFecha() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('noticia/new') ?>">New</a>
