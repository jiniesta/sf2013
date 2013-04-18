<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('noticia/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(true) ?>
          &nbsp;<a href="<?php echo url_for('noticia/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'noticia/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['titulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['titulo']->renderError() ?>
          <?php echo $form['titulo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['subtitulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['subtitulo']->renderError() ?>
          <?php echo $form['subtitulo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['texto']->renderLabel() ?></th>
        <td>
          <?php echo $form['texto']->renderError() ?>
          <?php echo $form['texto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha']->renderError() ?>
          <?php echo $form['fecha'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autores_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['autores_list']->renderError() ?>
          <?php echo $form['autores_list'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['secciones_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['secciones_list']->renderError() ?>
          <?php echo $form['secciones_list'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
