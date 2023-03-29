<?php $render('header'); ?>

<h2>Adicionar Novo Usuário</h2>

<!-- no action criar uma rota especifica para receber os dados , lá em routes-->
<form method="POST" action="<?= $base; ?>/novo">
    <label>
        Nome:<br>
        <input type="text" name="name">
    </label>

    <br><br>

    <label>
        Email:<br>
        <input type="email" name="email">
    </label>

    <br><br>

    <input type="submit" value="Adicionar">

</form>

<?php $render('footer'); ?>