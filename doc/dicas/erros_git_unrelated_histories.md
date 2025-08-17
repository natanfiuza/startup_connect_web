# Erro git: fatal: refusing to merge unrelated histories

Esse erro ocorre porque o repositório local e o remoto têm históricos diferentes (por exemplo, você criou arquivos localmente e também já existe um commit remoto, como um README ou LICENSE criado pelo GitHub). O Git está impedindo a junção automática porque os históricos não têm relação.

### Como corrigir

Você pode permitir que o Git faça o merge de históricos não relacionados usando a opção `--allow-unrelated-histories`:

```bash
git pull origin main --allow-unrelated-histories
```
Se sua branch principal for `master`, troque `main` por `master`.

### O que acontece?
- O Git vai mesclar os dois históricos e pode pedir para você resolver conflitos se houver arquivos diferentes com o mesmo nome.
- Depois de resolver conflitos (se existirem), faça:
  ```bash
  git add .
  git commit -m "Resolve merge de históricos não relacionados"
  git push origin main
  ```

---
