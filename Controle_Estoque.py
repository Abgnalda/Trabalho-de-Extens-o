import mysql.connector

# Conectar ao banco de dados
def conectar():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",  # Adicione sua senha se houver
        database="estoque"
    )

# Criar um novo item
def criar_item(produto, quantidade):
    conexao = conectar()
    cursor = conexao.cursor()
    cursor.execute("INSERT INTO `estoque.1` (Protudos, Quantidade) VALUES (%s, %s)", (produto, quantidade))
    conexao.commit()
    cursor.close()
    conexao.close()

# Ler todos os itens
def ler_itens():
    conexao = conectar()
    cursor = conexao.cursor()
    cursor.execute("SELECT * FROM `estoque.1`")
    itens = cursor.fetchall()
    cursor.close()
    conexao.close()
    return itens

# Atualizar um item
def atualizar_item(id, produto, quantidade):
    conexao = conectar()
    cursor = conexao.cursor()
    cursor.execute("UPDATE `estoque.1` SET Protudos=%s, Quantidade=%s WHERE id=%s", (produto, quantidade, id))
    conexao.commit()
    cursor.close()
    conexao.close()

# Excluir um item
def excluir_item(id):
    conexao = conectar()
    cursor = conexao.cursor()
    cursor.execute("DELETE FROM `estoque.1` WHERE id=%s", (id,))
    conexao.commit()
    cursor.close()
    conexao.close()
