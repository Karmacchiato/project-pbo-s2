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

public class Scene5Controller {
	private Stage stage;
	private Scene scene;
	private Parent root;
    @FXML
    private Label sizeLabel;
    @FXML
    private Label warnaLabel;
    @FXML
    private Label eksLabel;
    @FXML
    private Label pulauLabel;
    @FXML
    private Label totalHargaLabel;
    @FXML
    private Label bahanLabel;

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
        sizePriceMap.put("Small - Rp 50.000", 50000);
        sizePriceMap.put("Medium - Rp 55.000", 55000);
        sizePriceMap.put("Large - Rp 60.000", 60000);
        sizePriceMap.put("Xtra Large - Rp 65.000", 65000);
        return sizePriceMap;
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
    
    private Map<String, Integer> createBahanPriceMap() {
        Map<String, Integer> bahanPriceMap = new HashMap<>();
        bahanPriceMap.put("Katun - Rp 5.000", 5000);
        bahanPriceMap.put("Spandex - Rp 6.000", 6000);
        bahanPriceMap.put("Polyester - Rp 7.000", 7000);
        bahanPriceMap.put("Linen - Rp 8.000", 8000);
        
        return bahanPriceMap;
    }
    
    private void calculateTotalHarga() {
        int sizePrice = sizePriceMap.getOrDefault(selectedSize, 0);
        int pulauPrice = pulauPriceMap.getOrDefault(selectedPulau, 0);
        int bahanPrice = bahanPriceMap.getOrDefault(selectedBahan, 0);
        int totalHarga = sizePrice + pulauPrice + bahanPrice;

        totalHargaLabel.setText("Total Harga: Rp " + totalHarga);
    }
    private void displaySelectedOptions() { 	
        sizeLabel.setText(selectedSize);
        warnaLabel.setText(selectedWarna);
        eksLabel.setText(selectedEks);
        pulauLabel.setText(selectedPulau);
        bahanLabel.setText(selectedBahan);
        
    }
    	
    public void switchToScene1(ActionEvent event) throws IOException {
    		Parent root = FXMLLoader.load(getClass().getResource("Scene1.fxml"));
    		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
    		scene = new Scene(root);
    		stage.setScene(scene);
    		stage.show();
    	}
    public void switchToScene2(ActionEvent event) throws IOException {
    		Parent root = FXMLLoader.load(getClass().getResource("Scene2.fxml"));
    		stage = (Stage)((Node)event.getSource()).getScene().getWindow();
    		scene = new Scene(root);
    		stage.setScene(scene);
    		stage.show();
    	}
    	
    	

    
   

    
    

}
