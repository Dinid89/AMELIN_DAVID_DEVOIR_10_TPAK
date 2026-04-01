<div class="modal fade" tabindex="-1" id="modal-<?= $trajet['id_trajets'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Détails du trajet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column gap-2 text-start bg-light">
        <span><strong>Auteur :</strong> <?= htmlspecialchars($trajet["prenom_users"] . " " . $trajet["nom_users"]); ?></span>
        <span><strong>Téléphone :</strong> <?= htmlspecialchars($trajet["phone_users"]); ?></span>
        <span><strong>E-mail :</strong> <?= htmlspecialchars($trajet["mail_users"]); ?></span>
        <span><strong>Nombre total de place :</strong> <?= htmlspecialchars($trajet["places_dispo_trajet"]); ?></span>
      </div>
      <div class="modal-footer bg-primary">
        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>