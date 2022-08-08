<div class="form-titulo">
    <h1>Criar Novo blog!</h1>
</div>
<section>
<form action="includes/criar-blog.inc.php" method="POST">
    <div>
        <label>Titulo do Blog:</label>
        <input type="text" name="titulo" required /> 
    </div>
    <div>
        <label>Descrição do Blog:</label>
        <input type="text" name="desc" required /> 
    </div>
    <div>
        <label>Digite algumas Palavras-Chaves:</label>
        <input type="text" name="keywords" placeholder="Separe por virgula" required />
        
    </div>
    <div>
        <button type="submit" name="submit">Criar</button>
    </div>
</form>
</section>
