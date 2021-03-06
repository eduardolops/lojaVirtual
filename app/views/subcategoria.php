<h2>Subcategoria: <?php echo $subcategoria->tb_subcategorias_nome; ?></h2>

<?php if(count($produtos) == 0): ?>
	Nenhum produto cadastrado para essa categoria
<?php else: ?>

	<?php foreach($produtos as $produto): ?>
	
		<div class="produtos">
			
			<div class="produtos-foto">
				<img src="<?php echo site_url().'/public/'.$produto->tb_produtos_foto; ?>" width="150" height="120">
			</div>
			<div class="produto-nome"><?php echo $produto->tb_produtos_nome; ?></div>
			<div class="produto-preco"><?php echo numberFormat($produto->tb_produtos_preco); ?></div>
			<div class="produto-btn">
				<a href="/detalhes/<?php echo $produto->tb_produtos_slug; ?>" class="btn btn-primary">Detalhes</a>
				<a href="" class="btn btn-danger">Comprar</a>
			</div>

		</div>

	<?php endforeach; ?>
<?php endif; ?>	