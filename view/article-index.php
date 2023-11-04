{{ include('header.php', {title:'Article'}) }}

<body>
    <div class="container">
        <h1>Liste D'Aritcle</h1>
        <table>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Categorie</th>
                <th>Delete</th>
            </tr>
            {% for article in articles %}
                <tr>
                    <td><a href="{{path}}article/show/{{ article.id }}">{{article.id}} : {{ article.titre }}</a></td>
                    <td>{{ article.auteur }}</td>
                    <td>{{ article.categorie }}</td>
                    <td>
                        <form action="{{path}}article/destroy">
                            <input type="hidden" name="id" value="{{ article.id }}">
                            <input type="submit" value="Delete" class="btn-danger">
                        </form>
                    </td>
                </tr>
            {% endfor %}

        </table>
        <br><br>
        <a href="{{path}}article/create" class="btn">Ajouter</a>
    </div>
    
</body>
</html>