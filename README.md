# EC-CUBE2系モジュールサンプル

EC-CUBE2系のモジュールを Docker で開発するサンプルです。

## 対応バージョン

docker-compose.yml の `image:` を使用したいバージョンに合わせて変更してください。

```yaml
## 例) EC-CUBE 2.12.6 をPHP 5.5 で使用したい場合
image: ghcr.io/nanasess/ec-cube2-php:5.5-apache-2.12.6
```

### PHPバージョン

- 5.4
- 5.5
- 5.6

### EC-CUBEバージョン

- 2.11.5
- 2.12.6
- 2.13.5
- 2.17.x

2.17.x は、公式の Docker イメージ(PHP5.4-8.1)があります

```yaml
## 例) EC-CUBE 2.17.x をPHP 8.0 で使用したい場合
image: ghcr.io/nanasess/ec-cube2-php:8.0-apache
```

## Usage

Docker コンテナが起動したら、 https://localhost:4430 にアクセスしてください。
管理画面は https://localhost:4430/admin にアクセスしてください。
(ID:admin, PASS: password)

### PostgreSQL を使用する場合

```
docker-compose -f docker-compose.yml -f docker-compose.pgsql.yml -f docker-compose.dev.yml up -d
```

### MySQL を使用する場合

```
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml -f docker-compose.dev.yml up -d
```

## サンプルモジュールについて

このサンプルは、EC-CUBE2系モジュールのサンプルを含んでいます。
サンプルモジュールがインストール済みの状態で、Docker コンテナが起動します。

**管理画面→オーナーズストア→購入商品一覧→購入商品一覧を取得する** をクリックし、一覧の **設定** をクリックすると、サンプルモジュールの設定画面にアクセスできます。

このリポジトリは、 EC-CUBEの `data/downloads/module/mdl_sample` にマウントされています。
[config.php](./config.php) を修正することで、モジュールの設定画面を編集可能です。

## Docker コンテナ起動時の設定

Docker コンテナ起動時に任意のSQLを実行したい場合は、 [dockerbuild/sql/setup.sql](./dockerbuild/sql/setup.sql) を編集してください。

また [docker-compose.dev.yml](./docker-compose.dev.yml) の `entrypoint` を修正することで、起動時にスクリプトを実行できます。

## See Also

- [Composerを使いこなしてEC-CUBE4系プラグインの開発効率を爆上げする](https://zenn.dev/nanasess/articles/ec-cube4-plugin-development)
- [10分でEC-CUBEプラグインのE2Eテストを書いてみる](https://zenn.dev/nanasess/articles/ec-cube-plugin-e2etesting-in-10mins)
