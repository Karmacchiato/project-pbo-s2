package application;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.scene.control.Label;
import javafx.stage.Stage;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.ChoiceBox;

import java.io.IOException;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;
public class Scene6Controller {
	private Stage stage;
	private Scene scene;
	private Parent root;
	@FXML
    private Label sizeLabel1;
    @FXML
    private Label warnaLabel1;
    @FXML
    private Label eksLabel1;
    @FXML
    private Label pulauLabel1;
    @FXML
    private Label totalHargaLabel1;
    @FXML
    private Label bahanLabel1;
    
    private String selectedSize;
    private String selectedWarna;
    private String selectedEks;
    private String selectedPulau;
    private String selectedBahan;
    
    private Map<String, Integer> sizePriceMap;
    private Map<String, Integer> pulauPriceMap;
    private Map<String, Integer> bahanPriceMap;
    
    public void setSelectedSize(String selectedSize) {
        this.selectedSize = selectedSize;
    }

    public void setSelectedWarna(String selectedWarna) {
        this.selectedWarna = selectedWarna;
    }

    public void setSelectedEks(String selectedEks) {
        this.selectedEks = selectedEks;
    }

    public void setSelectedPulau(String selectedPulau) {
        this.selectedPulau = selectedPulau;
    }
    
    public void setSelectedBahan(String selectedBahan) {
        this.selectedBahan = selectedBahan;
    }
    
    public void initialize() {
        displaySelectedOptions();
        sizePriceMap = createSizePriceMap();
        pulauPriceMap = createPulauPriceMap();
        bahanPriceMap = createBahanPriceMap();
        calculateTotalHarga();
    }
    
    private Map<String, Integer> createSizePriceMap() {
        Map<String, Integer> sizePriceMap = new HashMap<>();
        sizePriceMap.put("S [70-72] - Rp 159.000", 159000);
        sizePriceMap.put("M [74-77] - Rp 179.000", 179000);
        sizePriceMap.put("L [79-82] - Rp 199.000", 199000);
        sizePriceMap.put("XL [84-88] - Rp 219.000", 219000);
        return sizePriceMap;
    }
    private Map<String, Integer> createBahanPriceMap() {
        Map<String, Integer> bahanPriceMap = new HashMap<>();
        bahanPriceMap.put("Drill - Rp 12.000", 12000);
        bahanPriceMap.put("Polyester - Rp 12.000", 12000);
        bahanPriceMap.put("Katun - Rp 15.000", 15000);
        bahanPriceMap.put("Denim - Rp 25.000", 25000);
        
        return bahanPriceMap;
    }
    private Map<String, Integer> createPulauPriceMap() {
        Map<String, Integer> pulauPriceMap = new HashMap<>();
        pulauPriceMap.put("Sumatra - Rp 30.000", 30000);
        pulauPriceMap.put("Jawa - Rp 40.000", 40000);
        pulauPriceMap.put("Kalimantan - Rp 70.000", 70000);
        pulauPriceMap.put("Sulawesi - Rp 85.000", 85000);
        pulauPriceMap.put("Papua - Rp 100.000", 100000);
        return pulauPriceMap;
    }
    private void calculateTotalHarga() {
        int sizePrice = sizePriceMap.getOrDefault(selectedSize, 0);
        int pulauPrice = pulauPriceMap.getOrDefault(selectedPulau, 0);
        int bahanPrice = bahanPriceMap.getOrDefault(selectedBahan, 0);
        int totalHarga = sizePrice + pulauPrice + bahanPrice;

        totalHargaLabel1.setText("Total Harga: Rp " + totalHarga);
    }
    private void displaySelectedOptions() { 	
        sizeLabel1.setText(selectedSize);
        warnaLabel1.setText(selectedWarna);
        eksLabel1.setText(selectedEks);
        pulauLabel1.setText(selectedPulau);
        bahanLabel1.setText(selectedBahan);
        
    }
    public void switchToScene1(ActionEvent event) throws IOException {
		Parent root = FXMLLoader.load(getClass().getResource("Scene1.fxml"));
		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
		scene = new Scene(root);
		stage.setScene(scene);
		stage.show();
	}
    public void switchToScene3(ActionEvent event) throws IOException {
		Parent root = FXMLLoader.load(getClass().getResource("Scene3.fxml"));
		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
		scene = new Scene(root);
		stage.setScene(scene);
		stage.show();
	}
}
