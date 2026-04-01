<div class="modal fade" tabindex="-1" id="modal-<?= $trajet['id_trajets'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Détails du trajet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column gap-2 text-start">
        <span><strong>Auteur :</strong> <?= htmlspecialchars($trajet["prenom_users"]); ?></span>
        <span><strong>Téléphone :</strong> <?= htmlspecialchars($trajet["phone_users"]); ?></span>
        <span><strong>E-mail :</strong> <?= htmlspecialchars($trajet["mail_users"]); ?></span>
        <span><strong>Nombre total de place :</strong> <?= htmlspecialchars($trajet["places_dispo_trajet"]); ?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>