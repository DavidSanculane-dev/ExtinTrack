
# 📘 Documento Técnico: Regras de Negócio do Sistema ExtinTrack

## 🎯 Objetivos do Sistema

- Garantir que todos os extintores estejam dentro da validade e em condições de uso.
- Controlar o stock de materiais usados na manutenção.
- Registar e rastrear todas as inspeções realizadas.
- Gerar alertas e relatórios para conformidade e auditoria.

---

## 👥 Atores do Sistema

| Tipo de Utilizador | Permissões |
|--------------------|------------|
| Administrador      | Gestão total do sistema |
| Inspetor           | Realiza inspeções e regista dados |
| Operador de Stock  | Regista entradas e saídas de materiais |

---

## 🔄 Fluxos de Processos

### 🧯 Extintores
- Cada extintor possui um **código único (QR)**.
- Associado a um **local** e possui uma **data de validade**.
- O sistema:
  - Alerta quando a validade estiver próxima (ex: 30 dias antes).
  - Permite registo de manutenção e troca.
  - Bloqueia inspeções em extintores vencidos (opcional).

### 📋 Inspeções
- Realizadas por inspetores autenticados.
- Cada inspeção inclui:
  - Data, observações, foto, localização GPS, assinatura digital.
- O sistema:
  - Valida se o extintor existe e está ativo.
  - Regista histórico de inspeções por extintor.
  - Gera relatório mensal por local ou inspetor.

### 📦 Stock de Materiais
- Cada material possui:
  - Nome, quantidade, unidade, local de armazenamento.
- O sistema:
  - Valida se há stock suficiente antes de saída.
  - Regista todas as movimentações com data e responsável.
  - Gera relatório de consumo por período.

### 📍 Locais
- Cada extintor e material está associado a um local.
- O sistema:
  - Permite gestão de locais com coordenadas GPS.
  - Mostra mapa com status dos extintores por local.

---

## ✅ Validações Importantes

- Autenticação via JWT obrigatória para todos os endpoints.
- Campos obrigatórios: código do extintor, data da inspeção, foto.
- Verificação de duplicidade de códigos QR.
- Controle de permissões por tipo de utilizador.

---

## 📈 Relatórios e Indicadores

- Extintores vencidos ou próximos da validade.
- Inspeções realizadas por período/local/inspetor.
- Consumo de materiais por tipo e período.
- Locais com maior incidência de manutenção.

---

## 📌 Observações Finais

Este documento serve como base para implementação das regras de negócio no backend (PHP), frontend web e aplicação mobile (Flutter ou .NET MAUI).
